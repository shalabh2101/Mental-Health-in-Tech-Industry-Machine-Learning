<?php

namespace App\Http\Controllers;

use App\Question;
use App\Survey;
use App\SurveyResponse;
use App\SurveySession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Option;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function showSurvey(){

        $questions = Question::getQuestionWithOptions()->toArray();

        $survey_id = session()->get('survey_session_id');

        if($survey_id != null)
        {
            $survey_session = SurveySession::where(['id' => $survey_id])->get();
        }

        if(is_null($survey_id))
        {
            $survey_session = SurveySession::create([
                    'start_time' => Carbon::now()->format('Y-m-d H:i:s'),
                    'is_complete' => 0
                ]
            );

           session()->put('survey_session_id', $survey_session->id);
            $survey_id = $survey_session->id;
        }

        return view("survey", ['survey_session_id' => $survey_id, 'total_questions' => count($questions), 'questions' => $questions]);
    }

    public function saveAnswer(Request $request)
    {
        $survey_response = $request->get('survey_response');
        $question = Question::where(['id' => $survey_response['question_id']])->first();
        $isLastQuestion = $survey_response['isLastQuestion'];

        if($question)
        {
            //Remove existing records if any
            SurveyResponse::where([
                'survey_session_id' => $survey_response['survey_id'],
                'question_id' => $survey_response['question_id']
            ])->delete();

            foreach ($survey_response['answer'] as $selection_option)
            {
                $temp_survey_reponse = new SurveyResponse();
                $temp_survey_reponse->question_id = $survey_response['question_id'];

                if($question->question_type == "SINGLE_OPTION" || $question->question_type == "MULTIPLE_OPTION") {
                    $temp_survey_reponse->selected_option = $selection_option;
                }
                else
                {
                    $temp_survey_reponse->answer_text = $selection_option;
                }

                $temp_survey_reponse->survey_session_id = $survey_response['survey_id'];
                $temp_survey_reponse->save();
            }


            if($isLastQuestion == "true")
            {
                $survey_session = SurveySession::where(['id' => $survey_response['survey_id']])->first();
//                dd($survey_session);
                $survey_session->end_time = Carbon::now()->format('Y-m-d H:i:s');
                $survey_session->is_complete = 1;
                $survey_session->save();
                session()->remove('survey_session_id');


                //Call ML API
                $question_ids = array_column(Question::where(['question_category' => 'MENTAL_HEALTH'])->get()->toArray(), 'id');
                $survey_id = 17;
                $question_ids = implode(",", $question_ids);

                $survey_result = DB::select("
                                                    select sr.id survey_session_id, sr.question_id question_id, answer_text, 
                                                    question_type, option_value, option_text 
                                                    from survey_responses sr
                                                    left join questions q on q.id = sr.question_id 
                                                    left join options o on o.id = sr.selected_option
                                                    where survey_session_id = $survey_id  
                                                    and sr.question_id in ($question_ids) 
                                                    order by q.id");
                $survey_data  = [];
                foreach ($survey_result as $survey_response)
                {
                    $response = '';
                    if($survey_response->question_type == "TEXT_BOX")
                    {
                        $response = $survey_response->answer_text;
                    }
                    else
                    {
                        $response = $survey_response->option_value;
                    }

                    $survey_data[$survey_response->question_id] = $response;

                }

                $prediction_result = PredictionController::predictTreatmentRequirement($survey_data);

                $survey_session->treatment_required = $prediction_result;
                $survey_session->save();
            }
        }

    }

    public function test()
    {

        $question_ids = array_column(Question::where(['question_category' => 'MENTAL_HEALTH'])->get()->toArray(), 'id');
        $survey_id = 17;
        $question_ids = implode(",", $question_ids);

        $survey_result = DB::select("select sr.id survey_session_id, sr.question_id question_id, answer_text, question_type, option_value, option_text from survey_responses sr
left join questions q on q.id = sr.question_id 
left join options o on o.id = sr.selected_option
where survey_session_id = $survey_id  and sr.question_id in ($question_ids) order by q.id");

        $survey_data  = [];
//        dd($survey_result);
        foreach ($survey_result as $survey_response)
        {
            $response = '';
            if($survey_response->question_type == "TEXT_BOX")
            {
                $response = $survey_response->answer_text;
            }
            else
            {
                $response = $survey_response->option_value;
            }

            $survey_data[$survey_response->question_id] = $response;
//            array_push($survey_data, $response);
        }

        $prediction_result = PredictionController::predictTreatmentRequirement($survey_data);
//        dd($prediction_result);
//        echo json_encode($survey_data);
//        die;
//        dd($survey_data);

        $survey_responses = SurveyResponse::where(['survey_session_id' => 17])->whereIn('question_id',[$question_ids]);
        $q = $survey_responses->toSql();
        $bindings = $survey_responses->getBindings();
        $r = $survey_responses->all();
        dd(DB::getQueryLog());
        print_r($q);
        dd($r);
        dd($bindings);
        dd($question_ids);
    }

    public function listSurveys()
    {
        $survey_list = Survey::paginate(10);
        return view('surveys.survey_list',['survey_list' => $survey_list, 'sidenav' => 'manage_survey']);
    }

    public function viewSurveyQuestionList($survey_id)
    {
        $questions = Question::where(['survey_id' => $survey_id])->paginate(10);
        if(!empty($questions))
        {
            $viewOnly = true;
            return view('surveys.survey_questions_list',['survey_id' => $survey_id, 'question_list' => $questions,'sidenav' => 'manage_questions','viewOnly' => $viewOnly]);
        }
    }

    public function editSurveyQuestionList($survey_id)
    {
        $questions = Question::where(['survey_id' => $survey_id])->paginate(10);
        if(!empty($questions))
        {
            $viewOnly = false;
            return view('surveys.survey_questions_list',['survey_id' => $survey_id, 'question_list' => $questions,'sidenav' => 'manage_questions','viewOnly' => $viewOnly]);
        }
    }

    public function editSurveyQuestion($question_id)
    {
        $question = Question::getQuestionWithOptions($question_id)->first();
        $survey_id = $question->survey_id;
        return view('surveys.survey_question',['survey_id' => $survey_id , 'question' => $question,'sidenav' => 'manage_questions', 'viewOnly' => false]);
    }

    public function viewSurveyQuestion($question_id)
    {
        $question = Question::getQuestionWithOptions($question_id)->first();
        $survey_id = $question->survey_id;
        return view('surveys.survey_question',['survey_id' => $survey_id ,'question' => $question,'sidenav' => 'manage_questions', 'viewOnly' => true]);
    }

    public function updateSurveyQuestion(Request $request)
    {
        $question_data = $request->get('question_data');
        $question_id = $question_data['id'];
        $question = Question::getQuestionWithOptions($question_id)->first();

        $question->question = $question_data['question'];
        $question->question_type = $question_data['question_type'];
        $question->question_category = $question_data['category'];
        $question->save();

        //Delete Old Options. Will not allow editing questions for published survey to keep things simple for now.
        Option::where([
            'question_id' => $question_id
        ])->delete();

        if(!empty($question_data['options']))
        {
            foreach($question_data['options'] as $q_option)
            {
                $option = new Option();
                $option->question_id = $question_id;
                $option->option_text = $q_option['option_text'];
                $option->option_value = $q_option['option_value'];
                $option->save();
            }
        }

        $response = [];
        $response['status'] = true;
        $response['message'] = "Question updated";
        return $response;
    }

    public function publishUpdate($survey_id, Request $request)
    {
        $publish_data = $request->get('publish_data');
        $survey = Survey::where(['id' => $survey_id])->first();

        $response = [];
        if(!empty($survey))
        {
            $survey->is_published = $publish_data['publish'];
            $survey->save();

            $response['status'] = true;
            $response['message'] = "Survey Updated successfully";
        }
        else
        {
            $response['status'] = false;
            $response['message'] = "Invalid request";
        }

        return $response;
    }

    public function getSurveySessions()
    {
        $survey_sessions = SurveySession::where(['is_complete' => 1])->paginate(10);
        return view('surveys.survey_sessions',['survey_sessions' => $survey_sessions, 'sidenav' => 'survey_sessions']);
    }

    public function addSurveyQuestionForm($survey_id)
    {
        return view('surveys.add_question',['survey_id' => $survey_id, 'sidenav' => 'survey_add_question']);
    }

    public function addSurveyQuestion($survey_id, Request $request)
    {
        $question_data = $request->get('question_data');

        $question = new Question();
        $question->question = $question_data['question'];
        $question->question_type = $question_data['question_type'];
        $question->question_category = $question_data['category'];
        $question->survey_id = $survey_id;
        $question->save();

        foreach($question_data['options'] as $q_option)
        {
            $option = new Option();
            $option->question_id = $question->id;
            $option->option_text = $q_option['option_text'];
            $option->option_value = $q_option['option_value'];
            $option->save();
        }

        $response = [];
        $response['status'] = true;
        $response['message'] = "Question Added";
        return $response;
    }

    public function createSurvey(Request $request)
    {
        $survey_data = $request->get('survey_data');

        $survey = new Survey();
        $survey->survey_name = $survey_data['name'];
        $survey->survey_type = $survey_data['type'];
        $survey->is_published = 0;
        $survey->save();

        $response = [];
        $response['status'] = true;
        $response['message'] = "Survey Added";
        return $response;
    }

    public function createSurveyForm()
    {
        return view("surveys.add_survey",['sidenav' => 'survey_create']);
    }

    public function takeEmployeeSurvey($survey_id, $employee_id){

        $questions = Question::getQuestionWithOptions(null, $survey_id)->toArray();

        $survey_session_id = session()->get('survey_session_id');
        $survey_employee_id = session()->get('survey_employee_id');

        if($survey_session_id != null)
        {
            $survey_session = SurveySession::where(['id' => $survey_id])->get();
        }

        if(is_null($survey_session_id) || $survey_employee_id != $employee_id)
        {
            $survey_session = SurveySession::create([
                    'start_time' => Carbon::now()->format('Y-m-d H:i:s'),
                    'survey_id' => $survey_id,
                    'employee_id' => $employee_id,
                    'is_complete' => 0
                ]
            );
            session()->put('survey_session_id', $survey_session->id);
            session()->put('survey_employee_id', $employee_id);
            $survey_session_id = $survey_session->id;
        }

        return view("survey", ['survey_session_id' => $survey_session_id, 'total_questions' => count($questions), 'questions' => $questions]);
    }

}

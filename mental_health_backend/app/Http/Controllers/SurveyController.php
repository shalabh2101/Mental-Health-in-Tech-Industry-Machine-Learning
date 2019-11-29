<?php

namespace App\Http\Controllers;

use App\Question;
use App\Survey;
use App\SurveyResponse;
use App\SurveySession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Option;

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

//        var_dump($isLastQuestion);
//        echo $isLastQuestion == "true";

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
            }
        }

    }

    public function listSurveys()
    {
        $survey_list = Survey::paginate(10);
        return view('surveys.survey_list',['survey_list' => $survey_list, 'sidenav' => 'manage_survey']);
    }

    public function viewSurveyQuestionList($survey_id)
    {
        $questions = Question::where(['survey_id' => 1])->paginate(10);
        if(!empty($questions))
        {
            $viewOnly = true;
            return view('surveys.survey_questions_list',['question_list' => $questions,'sidenav' => 'manage_questions','viewOnly' => $viewOnly]);
        }
    }

    public function editSurveyQuestionList($survey_id)
    {
        $questions = Question::where(['survey_id' => 1])->paginate(10);
        if(!empty($questions))
        {
            $viewOnly = false;
            return view('surveys.survey_questions_list',['question_list' => $questions,'sidenav' => 'manage_questions','viewOnly' => $viewOnly]);
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

        foreach($question_data['options'] as $q_option)
        {
            $option = new Option();
            $option->question_id = $question_id;
            $option->option_text = $q_option['option_text'];
            $option->option_value = $q_option['option_value'];
            $option->save();
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

}

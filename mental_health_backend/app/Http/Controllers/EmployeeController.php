<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Survey;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function viewEmployeeProfile($employee_id)
    {

        if(!is_numeric($employee_id) || $employee_id < 0)
        {
            return redirect("/");
        }

        $server_url = env('ML_SERVER_URL');
        $request = ['name' => $employee_id];

        $mental_health_data = DB::select("select *
from (select max(id) latest_id, employee_id  from survey_session where is_complete = 1 group by employee_id) a
inner join employees e on e.id = a.`employee_id`
inner join mental_treatment_status mts on mts.survey_session_id = a.latest_id
where employee_id = $employee_id");

        try{

            $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

            $res = $client->post($server_url ,
                ['body' => json_encode($request, JSON_NUMERIC_CHECK)]
            );

            $recommendation_data = json_decode($res->getBody(),true);
            $recommendation_data = $recommendation_data['result'];
            if(is_array($recommendation_data))
            {
                //Data Found
                $employee_data = array_pop($recommendation_data);
                $recommendation_data[0]['class'] = "card-header-warning";
                $recommendation_data[0]['name'] = Employee::where(['id' => $recommendation_data[0]['id']])->first()->name;

                $recommendation_data[1]['class'] = "card-header-success";
                $recommendation_data[1]['name'] = Employee::where(['id' => $recommendation_data[1]['id']])->first()->name;

                $recommendation_data[2]['class'] = "card-header-danger";
                $recommendation_data[2]['name'] = Employee::where(['id' => $recommendation_data[2]['id']])->first()->name;
            }
            else
            {
                //No data found
                $employee_data = [];
                $recommendation_data = [];
            }
        }
        catch (\Exception $e)
        {
            $network_error = true;
            $employee_data = [];
            $recommendation_data = [];
        }

        $employee = Employee::where(['id' => $employee_id])->first();

        return view('employees.employee_recommendation',
            [
                  'recommendation_data' => $recommendation_data,
                  'mental_health_data' => $mental_health_data,
                  'employee_data' => $employee_data,
                  'employee' => $employee,
                  'sidenav' => 'employee_list'
            ]);
    }

    public function viewAvailableSurveys($employee_id)
    {
        $survey_list = Survey::where(['is_published' => 1])->get();
        return view("employees.employee_survey_list", ['survey_list' => $survey_list, 'sidenav' => 'employee_list', 'employee_id' => $employee_id]);
    }

}

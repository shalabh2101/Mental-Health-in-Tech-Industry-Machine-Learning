<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function viewEmployeeProfile($employee_id)
    {

        $employee = Employee::where(['id' => $employee_id])->first();
        $employee_interests = ['Rock', 'Latino', 'Comedy', 'Romantic', 'Fantasy/Fairy tales', 'Animated', 'Mathematics', 'Internet', 'Economy Management', 'Shopping', 'Fun with friends', 'Pets', 'Dangerous dogs', 'Thinking ahead', 'Decision making', 'Self-criticism', 'Mood swings', 'Achievements', 'Getting angry', 'Happiness in life', 'Finances'];

        $list1 = ['Rock', 'Latino', 'Comedy', 'Romantic', 'Fantasy/Fairy tales', 'Animated', 'Mathematics', 'Internet', 'Economy Management', 'Shopping', 'Fun with friends', 'Pets', 'Dangerous dogs', 'Thinking ahead', 'Decision making', 'Self-criticism', 'Mood swings', 'Achievements', 'Getting angry', 'Happiness in life', 'Finances'];
        $list2 = ['Rock', 'Latino', 'Comedy', 'Romantic', 'Fantasy/Fairy tales', 'Animated', 'Mathematics', 'Internet', 'Economy Management', 'Shopping', 'Fun with friends', 'Pets', 'Dangerous dogs', 'Thinking ahead', 'Decision making', 'Self-criticism', 'Mood swings', 'Achievements', 'Getting angry', 'Happiness in life', 'Finances'];
        $list3 = ['Rock', 'Latino', 'Comedy', 'Romantic', 'Fantasy/Fairy tales', 'Animated', 'Mathematics', 'Internet', 'Economy Management', 'Shopping', 'Fun with friends', 'Pets', 'Dangerous dogs', 'Thinking ahead', 'Decision making', 'Self-criticism', 'Mood swings', 'Achievements', 'Getting angry', 'Happiness in life', 'Finances'];

        return view('employees.employee_recommendation',
            ['employee_interests' => $employee_interests,
              'employee' => $employee,
              'list1' => $list1,
                'list2' => $list2,
                'list3' => $list3,
                'sidenav' => 'employee_suggestion'
            ]);
    }

    public function viewAvailableSurveys($employee_id)
    {
        $survey_list = Survey::where(['is_published' => 1])->get();
        return view("employees.employee_survey_list", ['survey_list' => $survey_list, 'sidenav' => 'employee_survey', 'employee_id' => $employee_id]);
    }
}

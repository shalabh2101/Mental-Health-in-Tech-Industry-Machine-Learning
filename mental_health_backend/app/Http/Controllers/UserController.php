<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Events\UserRegisterViaEmailEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(Request $request)
    {
    }

    public function loginView()
    {
        if (Auth::user()) {
            return redirect()->intended('/dashboard');
        }
        return view("login");
    }

    public function verifyLogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        if (!empty($email) && !empty($password) && Auth::attempt(['email' => $email, 'password' => $password])) {
                return Redirect()->intended('/dashboard');
        } else {
            return Redirect::back()->withErrors(['Invalid Username and Password']);
        }
    }


    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:50',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users',
        ]);

        //dd($validator);

//        if ($validator->fails()) {
//            return redirect('/register')->withErrors($validator)->withInput();
//        }
        $user = User::createUser($request);

//        dd($user);

//        event(new UserRegisterViaEmailEvent($user));
        return redirect("/login");
    }

    public function loadRegisterView()
    {
        if (Auth::user()) {
            return redirect('/dashboard');
        }
        return view('registerView');
    }

    public function logout()
    {
        if (Auth::user()) {
            return redirect('/')->with(Auth::logout());
        }

        return redirect('/');
    }

    public function employeeList()
    {
        $employee_list = Employee::paginate(10);

        $summary = DB::select("select
                                count(case when treatment_required = 'Yes' then 1 end) treatment_yes_count,
                                count(case when treatment_required = 'No' then 1 end) treatment_no_count,
                                count(case when fear = 'Yes' then 1 end) fear_yes_count,
                                count(case when fear = 'No' then 1 end) fear_no_count
                                 from
                                (select max(id) latest_id, employee_id  from survey_session
                                where is_complete = 1
                                group by employee_id) a
                                inner join employees e on e.id = a.`employee_id`
                                inner join mental_treatment_status mts on mts.survey_session_id = a.latest_id");

//        dd($summary[0]);
        $treatment_yes_count = $summary[0]->treatment_yes_count;
        $treatment_no_count = $summary[0]->treatment_no_count;
        $fear_yes_count = $summary[0]->fear_yes_count;
        $fear_no_count = $summary[0]->fear_no_count;

        return view('employees.employee_list',
            [
                'employee_list' => $employee_list,
                'sidenav' => 'employee_list',
                'treatment_yes_count' => $treatment_yes_count,
                'treatment_no_count' => $treatment_no_count,
                'fear_yes_count' => $fear_yes_count,
                'fear_no_count' => $fear_no_count,
            ]);
    }

}

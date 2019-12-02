<?php

namespace App\Http\Controllers;

use App\Employee;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboard()
    {
        if (Auth::user()) {
            $employee_count = Employee::all()->count();
            return view("dashboard", ['sidenav' => 'dashboard', 'employee_count' => $employee_count]);
        }
        return view("login");
    }
}

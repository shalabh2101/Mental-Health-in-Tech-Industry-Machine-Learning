<?php

namespace App\Http\Controllers;

use App\Events\UserRegisterViaEmailEvent;
use App\User;
use Illuminate\Http\Request;
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

}

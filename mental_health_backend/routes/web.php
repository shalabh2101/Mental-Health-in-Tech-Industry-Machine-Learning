<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\LoginController;
//use Illuminate\Routing\Route;

Route::get('/', "DashboardController@dashboard");

Route::get('/login', 'UserController@loginView')->name('login');
Route::get('/logout', 'UserController@logout');

Route::post('/verify-login', 'UserController@verifyLogin');
Route::get('/verify-login', 'DashboardController@dashboard');

Route::post('/register','UserController@registerUser');
Route::get('/register',"UserController@loadRegisterView");


Route::get("/dashboard","DashboardController@dashboard");

Route::get("/survey/start","SurveyController@showSurvey");

Route::post('/survey/save-answer', 'SurveyController@saveAnswer');

Route::get("/survey/list","SurveyController@listSurveys");

Route::get("/survey/view/{survey_id}","SurveyController@viewSurveyQuestions");

Route::get("/survey/question/{question_id}/edit","SurveyController@editSurveyQuestion");

Route::post("/survey/question/update","SurveyController@updateSurveyQuestion");
//Route::get("/appointments","AppointmentsController@getAllAppointments");
//
//Route::get("/appointment/view/{id}", "AppointmentsController@viewAppointment");
//
//Route::get("/appointment/manage/{id}", "AppointmentsController@manageAppointment");
//
//Route::post("/appointment/update", "AppointmentsController@updateAppointment");

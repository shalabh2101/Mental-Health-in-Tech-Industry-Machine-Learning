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

Route::get('/', "HomeController@home");

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

Route::get("/survey/view/{survey_id}","SurveyController@viewSurveyQuestionList");
Route::get("/survey/edit/{survey_id}","SurveyController@editSurveyQuestionList");


Route::get("/survey/question/{question_id}/edit","SurveyController@editSurveyQuestion");
Route::get("/survey/question/{question_id}/view","SurveyController@viewSurveyQuestion");

Route::post("/survey/question/update","SurveyController@updateSurveyQuestion");
Route::post("/survey/publish_update/{survey_id}","SurveyController@publishUpdate");

Route::get("/survey/{survey_id}/question/add","SurveyController@addSurveyQuestionForm");
Route::post("/survey/{survey_id}/question/add","SurveyController@addSurveyQuestion");

Route::get("/survey/test", "SurveyController@test");
Route::get("/survey/sessions", "SurveyController@getSurveySessions");

Route::get("/employees/employee_list", "UserController@employeeList");

Route::get("/employees/profile/{employee_id}", "EmployeeController@viewEmployeeProfile");

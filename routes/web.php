<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacherlogincontroller;
use App\Http\Controllers\Changepassword;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\StudentResultController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/teacherin', [Teacherlogincontroller::class, 'dashboard_func']);
Route::get('/teacherin', [Teacherlogincontroller::class,'teacherlogindata']);

Route::get('/teacherlogin/home', [function () {return view('teacherlogin');}]);


// Route::get('/teacherhomepage', [Teacherlogincontroller::class, 'teacherhome']);
Route::get('/changepassfile', [function(){return view('changepassword');}]);

Route::get('/dashboard', [Teacherlogincontroller::class, 'dashboard_func']);

Route::get('/queryRunning', [Changepassword::class, 'checkValueChangepass']);
Route::get('/logoutpage', [Changepassword::class, 'logoutuser']);

Route::get('/messageboxdata', [DashboardController::class, 'messageboxfunction']);
Route::get('/deletelastmessage', [DashboardController::class, 'deleteThemessage']);


Route::get('/selectedClassUrl', [DashboardController::class, 'selectClass_attend']);

// Route::get('/attendanceTake', [function(){ return view('components/attendanceStudent'); }]);
Route::get('/attendanceTake', [AttendanceController::class, 'fetch_class_sub']);
Route::get('/registration_form', [RegistrationController::class, 'registrationPage_fetch']);
Route::post('/registration_form', [RegistrationController::class, 'submitRegistration']);
Route::get('/select_reg_pass', [RegistrationController::class, 'select_last_data']);

Route::get('/selectClassOption', [AttendanceController::class, 'selectSubject']);
Route::get('/searchAttendanceClass', [AttendanceController::class, 'searchAttendance']);

Route::post('/submitAttendance', [AttendanceController::class, 'submitAttendanceFunction']);


Route::get('/classes_manage', [ClassTimetableController::class, 'fetch_timetable_page']);
Route::get('/select_time_table', [ClassTimetableController::class, 'time_table_classwise']);
Route::post('/timetable_submit', [ClassTimetableController::class, 'submit_new_timetable']);
Route::post('/change_timing_classes', [ClassTimetableController::class, 'changeTimingClasses']);


Route::get('/result_making', [StudentResultController::class, 'fetch_result_page']);
Route::get('/selectResultClass', [StudentResultController::class, 'fetch_result_Subject']);
Route::get('/search_student_result', [StudentResultController::class, 'search_result_student']);
Route::post('/submit_marks', [StudentResultController::class, 'submit_result_marks']);

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('attendance',['as'=>'attendance','uses'=>'AttendanceController@index']);
Route::get('first_semester','AttendanceController@firstSemester');


Route::group(['middleware'=>'auth','prefix' => 'backend'],function() {

    Route::get('semesters/{semester}/confirm',[
        'as' => 'semesters.delete.confirm',
        'uses' => 'Backend\SemesterController@confirm'
    ]);
    Route::resource('semesters','Backend\SemesterController');


    Route::get('roles/{role}/confirm',[
        'as' => 'roles.delete.confirm',
        'uses' => 'Backend\RoleController@confirm'
    ]);
    Route::resource('roles','Backend\RoleController');

    Route::get('students/{student}/confirm',[
        'as' => 'students.delete.confirm',
        'uses' => 'Backend\StudentController@confirm'
    ]);
    Route::resource('students','Backend\StudentController');

    Route::get('users/{user}/confirm',[
        'as' => 'users.delete.confirm',
        'uses' => 'Backend\UserController@confirm'
    ]);
    Route::resource('users','Backend\UserController');


});
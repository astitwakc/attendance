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
Route::get('backend/semesters/{semester}/confirm',[
    'as' => 'semesters.delete.confirm',
    'uses' => 'Backend\SemesterController@confirm'
]);
Route::resource('backend/semesters','Backend\SemesterController');
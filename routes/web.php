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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tests', ['as' => 'tests',
        'uses' => 'TestController@index']);
    Route::get('/tests/take/{id}', ['as' => 'tests.take',
        'uses' => 'TestController@take']);
    Route::get('/tests/take/{id}/question/{question_num}',
        ['as' => 'tests.question', 'uses' => 'TestController@question']);
    Route::get('/tests/take/{id}/question/{question_num}/answer/{animal_id}',
        ['as' => 'tests.answer', 'uses' => 'TestController@question']);
    Route::get('/tests/finish/{id}',
        ['as' => 'tests.finish', 'uses' => 'TestController@finish']);
});

//Route::group(['middleware' => ['auth', 'admin']], function() {
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

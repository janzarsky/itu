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
    Route::get('/tests/finish/{id}',
        ['as' => 'tests.finish', 'uses' => 'TestController@finish']);

    Route::get('/animals', ['as' => 'animals',
        'uses' => 'AnimalController@index']);

    Route::get('/stats', ['as' => 'stats',
        'uses' => 'StatController@index']);
});

Auth::routes();

Route::get('/', function() { return Redirect::route('tests'); });


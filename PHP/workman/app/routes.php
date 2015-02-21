<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */


Route::get('/login','HomeController@showLogin');
Route::post('/login', 'HomeController@login');
Route::post('/logout', 'HomeController@logout');
Route::get('/register','HomeController@showRegister');
Route::group(['before' => 'auth'], function() {
    Route::resource('/user', 'UserController');
    Route::resource('/user/{id}/comment', 'CommentController');
    Route::resource('/user/{id}/car', 'CarController');
    Route::resource('/workman','WorkmanController');
    Route::resource('/workman/{id}/comment', 'CommentController');
    Route::resource('/workman/{id}/car', 'CarController');   
    
});
Route::get('user/{fromId}/vote/{toId}','VoteController@show');
Route::post('user/{fromId}/vote/{toId}','VoteController@store');
Route::get('workman/{id}/vote','VoteController@index');
Route::get('/', 'HomeController@showIndex');



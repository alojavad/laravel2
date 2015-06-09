<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', 'WelcomeController@index');
*/
Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
//Route::get('forum',['as'=>'forum','uses'=>'AsksController@create']);
/*
Route::get('/', function()
{
    return View::make('home');
});
*/
//Route::controller('auth', 'AuthController');

Route::resource('user', 'UserController');
Route::resource('topic', 'TopicController');
Route::resource('post', 'PostController');

// Post Routes
Route::post('post-control', 'TopicController@postControl');





Route::get('/',['as'=>'home','uses'=>'HomeController@index']);


Route::get('laravel/laravel',['as'=>'laravel1','uses'=>'LaravelController@index']);
Route::resource('laravel', 'LaravelController');
Route::resource('asks', 'AsksController');






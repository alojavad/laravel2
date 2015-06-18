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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);








Route::get('/home',['as'=>'home','uses'=>'HomeController@index']);
Route::get('/',['as'=>'home','uses'=>'HomeController@index']);


Route::get('laravel/laravel',['as'=>'laravel1','uses'=>'LaravelController@index']);
Route::resource('laravel', 'LaravelController');
Route::resource('news', 'NewsController');
Route::controller('news','NewsController');
Route::resource('tag', 'TagController');





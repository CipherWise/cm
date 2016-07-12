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


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/account', 'AccountController@index');

Route::get('/player_hud', 'PlayerHUDController@index');

Route::get('/character_creation', 'CharacterCreationController@index');

Route::get('/html/CharClassSelector', 'CharacterCreationController@CharClassSelector');

Route::resource('character-sheet','CharacterController');
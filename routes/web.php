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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', array(
    'as'    =>  'home',
    'uses'  =>  'HomeController@index' 
));

Route::get('/home', array(
    'as'    =>  'home.index',
    'uses'  =>  'LinkController@index' 
));

// Input Routes
Route::post('/make', array(
    'as'    =>  'makeUrl',
    'uses'  =>  'LinkController@makeUrl'
));

Route::get('/{code}', array(
    'as'    =>  'get',
    'uses'  =>  'LinkController@get'
));

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

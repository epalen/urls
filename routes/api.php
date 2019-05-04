<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List Links
Route::get('urls', 'LinkController@indexApi');

//List single Link
Route::get('url/{id}', 'LinkController@showApi');

//Create new Link
Route::post('url', 'LinkController@storeUrlapi');

//Create update Link
Route::put('url', 'LinkController@storeUrlapi');

//Delete Link
Route::delete('url/{id}', 'LinkController@destroyApi');
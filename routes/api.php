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

Route::get('users', 'UsersController@index')
    ->name('indexUsers');

Route::post('users', 'UsersController@store')
    ->name('storeUsers');

Route::get('/users/{user}', 'UsersController@show')
    ->where('user', '[0-9]+')
    ->name('showUsers');

Route::get('/users/new', 'UsersController@create')
    ->name('createUsers');    

Route::get('users/{user}', 'UsersController@edit')
    ->name('editUsers');

Route::post('users/{user}', 'UsersController@update')
    ->name('updateUsers');

Route::delete('users/{user}', 'UsersController@destroy')
    ->name('destroyUsers');  

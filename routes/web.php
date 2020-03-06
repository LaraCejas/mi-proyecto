<?php


Route::get('/', 'UsersController@home');

Route::get('/users', 'UsersController@index');

Route::get('/users/{id}', 'UsersController@show')
    ->where('id', '[0-9]+');

Route::get('/users/new', 'UsersController@createUser');


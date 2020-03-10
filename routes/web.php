<?php


Route::get('/', 'UsersController@home');

Route::get('/users', 'UsersController@index')
->name('users.index');

Route::get('/users/{user}', 'UsersController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');   

Route::get('/users/new', 'UsersController@create')
    ->name('users.create');

Route::post('/users/create', 'UsersController@store');    


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('tables', 'TaskController');
Route::post('tables/{id}/putted', 'TaskController@updateData');
Route::resource('newuser', 'NewUsersController');
Route::post('newuser/login','NewUsersController@login');
Route::post('newuser/reset','NewUsersController@resetPasswrod');
Route::post('newuser/{id}/putted', 'NewUsersController@updateData');
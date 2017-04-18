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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'user'], function () {
    Route::get('/login', 'UserController@showLogin');
    Route::post('/login', 'UserController@postLogin');
    Route::get('/logout', 'UserController@logout');
    Route::post('/logout', 'UserController@logout');
    Route::get('/edit', 'UserController@showEdit');
    Route::post('/edit', 'UserController@postEdit');
    Route::get('/register', 'UserController@showRegister');
    Route::post('/register', 'UserController@postRegister');
    Route::get('/profile', 'UserController@showProfile');
    Route::get('/notes', 'UserController@showNotes');
    Route::post('/notes', 'UserController@postNotes');
    Route::post('/editnote', 'UserController@editNote');
    Route::post('/posteditnote', 'UserController@postEditNote');
    Route::post('/deletenote', 'UserController@deleteNote');
    Route::post('/addnote', 'UserController@addNote');
    Route::get('/getall', 'UserController@getAll');
});

Route::get('/home', 'HomeController@index');

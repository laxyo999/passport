<?php

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/user', 'usercontroller');
Route::resource('/post', 'postcontroller');
Route::resource('/comment', 'commentcontroller');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

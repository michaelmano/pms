<?php

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('oauth')->group(function () {
    Route::get('slack', 'SlackController@index');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

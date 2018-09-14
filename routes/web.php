<?php

Route::get('/test', function () {
    dd(Slack::config());
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

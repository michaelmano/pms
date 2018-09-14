<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Profile')
    ->prefix('profile')
    ->name('profile.')
    ->group(function () {
        Route::get('/', 'ProfileController@index')->name('index');
        Route::post('/{user}/status', 'ProfileController@status')->name('status');
    });

Route::namespace('Slack')
    ->prefix('slack')
    ->name('slack.')
    ->group(function () {
        Route::get('/', 'SlackController@auth')->name('auth');
        Route::get('/callback', 'SlackController@callback')->name('callback');
    });

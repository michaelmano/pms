<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Profile')
    ->prefix('profile')
    ->name('profile.')
    ->group(function () {
        Route::get('/', 'ProfileController@index')->name('index');
        Route::get('/{user}', 'ProfileController@show')->name('show');
        Route::post('/{user}/status', 'ProfileController@status')->name('status');
    });

Route::namespace('Slack')
    ->prefix('slack')
    ->name('slack.')
    ->group(function () {
        Route::get('/', 'SlackController@auth')->name('auth');
        Route::get('/callback', 'SlackController@callback')->name('callback');
    });


Route::namespace('Project')
    ->prefix('project')
    ->name('project.')
    ->group(function () {
        Route::get('/', 'ProjectController@index')->name('index');
        Route::get('/{project}', 'ProjectController@show')->name('show');
    });

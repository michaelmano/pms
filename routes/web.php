<?php


Route::view('/', 'home');
Auth::routes();

Route::namespace('Profile')
    ->prefix('profile')
    ->name('profile.')
    ->group(function () {
        Route::get('/', 'ProfileController@index')->name('index');
        Route::get('/{user}', 'ProfileController@show')->name('show');
        Route::post('/{user}/status', 'ProfileController@status')->name('status');
    });

Route::namespace('Project')
    ->prefix('project')
    ->name('project.')
    ->group(function () {
        Route::get('/', 'ProjectController@index')->name('index');
        Route::get('/{project}', 'ProjectController@show')->name('show');
    });

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
    ->prefix('projects')
    ->name('projects.')
    ->group(function () {
        Route::get('/', 'ProjectController@index')->name('index');
        Route::post('/', 'ProjectController@store')->name('store');
        Route::get('/create', 'ProjectController@create')->name('create');
        Route::get('/{project}', 'ProjectController@show')->name('show');
    });

Route::namespace('Client')
    ->prefix('clients')
    ->name('clients.')
    ->group(function() {
        Route::get('/', 'ClientController@index')->name('index');
        Route::post('/', 'ClientController@store')->name('store');
        Route::get('/create', 'ClientController@create')->name('create');
        Route::get('/{client}', 'ClientController@show')->name('show');
    });

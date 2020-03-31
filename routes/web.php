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
        return view('list');
    });

    Route::get('/form', function () {
        return view('form.form');
    });

    Route::get('/form/config', 'formcontroller@config')->name('form-config');

    Route::post('/form', 'formcontroller@store_form')->name('store_form');
    Route::post('/form/{id}', 'formcontroller@edit')->name('edit_form');
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/bids', 'formcontroller@getBids')->name('getBids');
    Route::get('/bid/{id}', 'formcontroller@getBid')->name('getBid');
    Route::get('/lists', 'formcontroller@listBids')->name('listBids');

    Auth::routes();

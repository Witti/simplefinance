<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
});

Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/home', 'HomeController@index');

    Route::get('/account', 'AccountsController@index');
    Route::get('/account/edit/{id}', 'AccountsController@edit');
    Route::post('/account/update', 'AccountsController@update');
    Route::post('/account/store', 'AccountsController@store');
    Route::get('/account/delete/{id}', 'AccountsController@delete');

    Route::get('/transaction/account/{id}', 'TransactionsController@accountlist');
    Route::get('/transaction/create/account/{id}', 'TransactionsController@create');
    Route::post('/transaction/store', 'TransactionsController@store');
    Route::get('/transaction/delete/{id}', 'TransactionsController@delete');
    Route::get('/transaction/edit/{id}', 'TransactionsController@edit');
    Route::get('/transaction/duplicate/{id}', 'TransactionsController@duplicate');
    Route::post('/transaction/update/{id}', 'TransactionsController@update');

    Route::get('/transaction/repeated', 'TransactionsController@indexRepeated');
    Route::get('/transaction/repeated/create', 'TransactionsController@createRepeated');
    Route::post('/transaction/repeated/store', 'TransactionsController@storeRepeated');

    Route::get('/category', 'CategoriesController@index');
    Route::post('/category/store', 'CategoriesController@store');
    Route::get('/category/edit/{id}', 'CategoriesController@edit');
    Route::post('/category/update/{id}', 'CategoriesController@update');
    Route::get('/category/delete/{id}', 'CategoriesController@delete');

    Route::get('/lending', 'LendingsController@index');
    Route::get('/lending/create/transaction/{id}', 'LendingsController@createFromTransaction');
    Route::post('lending/store/{id}', 'LendingsController@store');
    Route::post('lending/update/{id}', 'LendingsController@update');
    Route::get('/lending/{id}', 'LendingsController@show');
    Route::get('/lending/close/{id}', 'LendingsController@close');
    Route::get('/lending/reopen/{id}', 'LendingsController@reopen');

    Route::get('/user','UsersController@edit');
    Route::post('/user','UsersController@update');
});

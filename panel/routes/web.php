<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('homeRoot');

    Route::resource('companies', 'CompanyController');
    Route::resource('employees', 'EmployeeController');

    Route::group(['prefix' => 'api'], function() {
        Route::get('companies', 'Api\\CompanyController@index');
        Route::get('companies/{id}/employees', 'Api\\CompanyController@employees');
    });
});

Auth::routes();

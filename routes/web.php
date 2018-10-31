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

Auth::routes();

Route::get('/', function() {
    return redirect(route('coparisons'));
})->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/comparaciones', 'ComparisonController@index')->name('comparisons');
    Route::get('/comparaciones/create', 'ComparisonController@create')->name('comparisons.create');
    Route::get('/comparaciones/{comparison}', 'ComparisonController@show')->name('comparisons.show');
    Route::post('/comparaciones', 'ComparisonController@store')->name('comparisons.store');
});
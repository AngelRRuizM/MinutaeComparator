<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'API'], function() {

    /**
     * Comparison routes
     */
    Route::post('comparisons', 'ComparisonController@store')->name('comparisons.store');
    Route::get('comparisons/{comparison}', 'ComparisonController@show')->name('comparisons.show');


    /**
     * Coincident routes
     */
    Route::post('coincidents', 'CoincidentController@store')->name('coincidents.store');
    Route::get('coincidents/{coincident}', 'CoincidentController@show')->name('coincidents.show');


    /**
     * Minutia routes
     */
    Route::post('minutias', 'MinutiaController@store')->name('minutias.store');
    Route::get('minutias/{minutia}', 'MinutiaController@show')->name('minutias.show');


});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

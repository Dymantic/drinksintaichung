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

Route::view('/', 'frontpage');

Route::get('api/establishments', function() {
    return \App\Establishments\Establishment::all()->map->toJsonableArray();
});

Route::get('api/features', function() {
    return \App\Establishments\Feature::all()->map->toJsonableArray();
});

Route::post('/suggested-establishments', 'SuggestedEstablishmentsController@store');

Route::view('admin/login', 'auth.login');
Route::post('admin/login', 'Auth\LoginController@login')->name('login');
Route::post('admin/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'DashboardController@home');

        Route::get('features', 'FeaturesController@index');
        Route::get('features/{feature}', 'FeaturesController@show');
        Route::post('features', 'FeaturesController@store');
        Route::post('features/{feature}', 'FeaturesController@update');
        Route::delete('features/{feature}', 'FeaturesController@delete');

        Route::get('establishments', 'EstablishmentsController@index');
        Route::view('establishments/search', 'admin.establishments.search');
        Route::get('establishments/{establishment}', 'EstablishmentsController@show');
        Route::post('establishments/{establishment}', 'EstablishmentsController@update');
        Route::post('establishments', 'EstablishmentsController@store');
        Route::delete('establishments/{establishment}', 'EstablishmentsController@delete');

        Route::post('establishments/{establishment}/features', 'EstablishmentFeatureListController@store');


        Route::get('suggested-establishments', 'SuggestedEstablishmentsController@index');
        Route::get('suggested-establishments/{suggestion}', 'SuggestedEstablishmentsController@show');
        Route::delete('suggested-establishments/{suggestion}', 'SuggestedEstablishmentsController@delete');


    });
});


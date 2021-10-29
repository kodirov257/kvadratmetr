<?php

use Illuminate\Support\Facades\Route;

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

Route::get('characteristics/{characteristic}', 'Api\Projects\CharacteristicController@show');

Route::group(['as' => 'api.', 'namespace' => 'Api'],
    function () {
        Route::get('/', 'HomeController@home');
        Route::post('/register', 'Auth\RegisterController@register');
        Route::post('/plan-price', 'Projects\PlanPriceController@create');

        Route::middleware('auth:api')->group(function () {
            Route::resource('projects', 'Projects\ProjectController')->only('index', 'show');
            Route::post('/projects/{project}/favorite', 'Projects\FavoriteController@add');
            Route::delete('/projects/{project}/favorite', 'Projects\FavoriteController@remove');

            Route::group(
                [
                    'prefix' => 'user',
                    'as' => 'user.',
                    'namespace' => 'User',
                ],
                function () {
                    Route::get('/', 'ProfileController@show');
                    Route::put('/', 'ProfileController@update');
                    Route::get('/favorites', 'FavoriteController@index');
                    Route::delete('/favorites/{project}', 'FavoriteController@remove');

                    Route::resource('projects', 'ProjectController')->only('index', 'show', 'update', 'destroy');
                    Route::post('/projects/create/{category}/{region?}', 'ProjectController@store');

                    Route::put('/projects/{project}/photos', 'ProjectController@photos');
                    Route::put('/projects/{project}/characteristics', 'ProjectController@characteristics');
                    Route::post('/projects/{project}/send', 'ProjectController@send');
                    Route::post('/projects/{project}/close', 'ProjectController@close');
                }
            );
        });
});

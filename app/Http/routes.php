<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/app/{optional?}', [
        'as' => 'app',
        'uses' => 'HomeController@index'
    ])->where('optional', '(.*)');

    Route::get('/', [
        'as' => 'welcome',
        'uses' => 'WelcomeController@index'
    ]);
});

foreach (File::allFiles(__DIR__.'/Routes') as $partial) {
    require $partial->getPathName();
}
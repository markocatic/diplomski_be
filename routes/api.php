<?php
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');


    Route::get('getSamsungProducts', 'Shared\ProductsController@getSamsungProducts');
    Route::get('getIphoneProducts', 'Shared\ProductsController@getIphoneProducts');
});
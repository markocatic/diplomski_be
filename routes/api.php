<?php
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');


    Route::get('getSamsungProducts', 'Shared\ProductsController@getSamsungProducts');
    Route::get('getIphoneProducts', 'Shared\ProductsController@getIphoneProducts');

    Route::get('getUserCart/{id}', 'Shared\CartController@getUserCart');
    Route::post('AddItemToCart', 'Shared\CartController@AddItemToCart');
    Route::post('deleteItemFromCart', 'Shared\CartController@deleteItemFromCart');
});
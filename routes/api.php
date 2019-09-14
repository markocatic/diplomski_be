<?php
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');


    Route::get('getSamsungProducts', 'Shared\ProductsController@getSamsungProducts');
    Route::get('getIphoneProducts', 'Shared\ProductsController@getIphoneProducts');
    Route::get('getAllProducts', 'Shared\ProductsController@getAllProducts');

    Route::get('getUserCart/{id}', 'Shared\CartController@getUserCart');
    Route::post('additemtocart', 'Shared\CartController@AddItemToCart');
    Route::post('deleteItemFromCart', 'Shared\CartController@deleteItemFromCart');
    Route::post('editItemInCart/{id}', 'Shared\CartController@editItemInCart');
    Route::get('checkout/{id}', 'Shared\CartController@checkout');
});
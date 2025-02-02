<?php
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');


    Route::get('getSamsungProducts', 'Shared\ProductsController@getSamsungProducts');
    Route::get('getIphoneProducts', 'Shared\ProductsController@getIphoneProducts');
    Route::get('getAllProducts', 'Shared\ProductsController@getAllProducts');
    Route::get('getOneProduct/{id}', 'Shared\ProductsController@getOneProduct');
    Route::get('getNewProducts', 'Shared\ProductsController@getNewProducts');
    Route::get('getTvProducts', 'Shared\ProductsController@getTvProducts');
    Route::get('getLaptopProducts', 'Shared\ProductsController@getLaptopProducts');

    Route::post('getUserCart', 'Shared\CartController@getUserCart');
    Route::post('additemtocart', 'Shared\CartController@AddItemToCart');
    Route::post('deleteItemFromCart', 'Shared\CartController@deleteItemFromCart');
    Route::post('editItemInCart/{id}', 'Shared\CartController@editItemInCart');
    Route::post('checkout', 'Shared\CartController@checkout');


    Route::post('insert', 'Shared\WishlistController@insert');
    Route::get('userList/{id}', 'Shared\WishlistController@userList');
    Route::post('delete/{userId}', 'Shared\WishlistController@deleteItem');

    Route::get('info', 'Shared\InfoController@info');
    Route::post('contact', 'Shared\ContactController@store');



    Route::get('getUsers', 'Admin\UserAdminController@getAllUsers');
    Route::get('getOne/{id}', 'Admin\UserAdminController@getOneUser');
    Route::post('userDelete', 'Admin\UserAdminController@delete');
    Route::post('update/{id}', 'Admin\UserAdminController@update');
    Route::post('save', 'Admin\UserAdminController@save');

    Route::post('deleteProduct', 'Admin\ProductAdminController@delete');
    Route::post('saveProduct', 'Admin\ProductAdminController@save');
    Route::post('updateProduct/{id}', 'Admin\ProductAdminController@update');


    Route::get('getContacts', 'Admin\ContactAdminController@getAllContact');
    Route::get('getAnswers', 'Admin\ContactAdminController@getAnsweredContact');
    Route::post('contactAnswer', 'Admin\ContactAdminController@insertAnswer');
    Route::post('deleteContact', 'Admin\ContactAdminController@delete');


    Route::get('getOrders', 'Admin\OrderAdminController@getOrders');
    Route::post('deleteOrder', 'Admin\OrderAdminController@deleteOrder');
    Route::get('getUserOrders/{id}', 'Admin\OrderAdminController@getUserOrders');
});

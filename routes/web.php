<?php

Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');


Route::get('/nextpay/request', 'RequestController@show');
Route::post('/nextpay/callback', 'CallBackController@show');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


Route::group([
        'prefix' => 'admin',
        'middleware' => ['auth', 'admin'],
        'namespace' => 'Admin',
        'as' => 'admin.',
    ], function () {
        Route::get('/dashboard', 'AdminDashboardController@index');
        Route::resource('/categories', 'CategoriesController')->except(['show']);
        Route::resource('/products', 'ProductsController')->except(['show']);
        Route::resource('/coupons', 'CouponsController')->except(['show']);
        Route::resource('/users', 'UsersController')->except(['show']);
        Route::get('/orders', 'OrdersController@index')->name('orders.index');
        Route::delete('/orders/{order}', 'OrdersController@destroy')->name('orders.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ShopController@search')->name('search');

Route::middleware('auth')->group(function () {
        Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
        Route::patch('/my-profile', 'UsersController@update')->name('users.update');

        Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
        Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});

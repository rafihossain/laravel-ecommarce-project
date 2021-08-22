<?php

Route::get('/', [
    'uses'  => 'NewShopController@index',
    'as'    => '/'
]);
Route::get('/category/product/{id}', [
    'uses'  => 'NewShopController@categoryProduct',
    'as'    => 'category-product'
]);

Route::get('/product/details/{id}/{name}', [
    'uses'  => 'NewShopController@detailsProduct',
    'as'    => 'product-details'
]);


Route::post('/cart/add', [
    'uses'  => 'CartController@addToCart',
    'as'    => 'add-to-cart'
]);
Route::get('/cart/show', [
    'uses'  => 'CartController@showCart',
    'as'    => 'show-cart'
]);
Route::get('/cart/delete/{id}', [
    'uses'  => 'CartController@deleteCart',
    'as'    => 'delete-cart-item'
]);
Route::post('/cart/update', [
    'uses'  => 'CartController@updateCart',
    'as'    => 'cart-update'
]);


Route::get('/checkout', [
    'uses'  => 'CheckoutController@index',
    'as'    => 'checkout'
]);


Route::post('/customer/registration', [
    'uses'  => 'CheckoutController@customerSignUp',
    'as'    => 'customer-sign-up'
]);
Route::post('/customer/login', [
    'uses'  => 'CheckoutController@customerLogin',
    'as'    => 'customer-login'
]);
Route::post('/customer/logout', [
    'uses'  => 'CheckoutController@customerLogout',
    'as'    => 'customer-logout'
]);


Route::get('/account/login-info', [
    'uses'  => 'CheckoutController@accountLoginInfo',
    'as'    => 'account-login-info'
]);
Route::post('/account/login', [
    'uses'  => 'CheckoutController@accountLogin',
    'as'    => 'account-login'
]);


Route::get('/user/account', [
    'uses'  => 'CheckoutController@accountUser',
    'as'    => 'user-account',
    'middleware' => 'newshopcustomer'
]);



Route::get('/account/register-info', [
    'uses'  => 'CheckoutController@accountRegisterInfo',
    'as'    => 'account-register-info'
]);
Route::post('/account/register', [
    'uses'  => 'CheckoutController@accountRegister',
    'as'    => 'account-register'
]);


Route::get('/checkout/shipping', [
    'uses'  => 'CheckoutController@shippingForm',
    'as'    => 'checkout-shipping'
]);
Route::post('/shipping/save', [
    'uses'  => 'CheckoutController@saveShippingInfo',
    'as'    => 'new-shipping'
]);
Route::get('/checkout/payment', [
    'uses'  => 'CheckoutController@paymentForm',
    'as'    => 'checkout-payment'
]);
Route::post('/checkout/order', [
    'uses'  => 'CheckoutController@newOrder',
    'as'    => 'new-order'
]);
Route::get('/complete/order', [
    'uses'  => 'CheckoutController@completeOrder',
    'as'    => 'complete-order'
]);




Route::group( ['middleware' => 'newshop'], function () {


    Route::get('/category/add', [
        'uses'  => 'CategoryController@index',
        'as'    => 'category-add'
    ]);
    Route::get('/category/manage', [
        'uses'  => 'CategoryController@manageCategory',
        'as'    => 'category-manage'
    ]);
    Route::post('/category/save', [
        'uses'  => 'CategoryController@saveCategory',
        'as'    => 'category-save'
    ]);


    Route::get('/category/unpublished/{id}', [
        'uses'  => 'CategoryController@unpublishedCategory',
        'as'    => 'category-unpublished'
    ]);
    Route::get('/category/published/{id}', [
        'uses'  => 'CategoryController@publishedCategory',
        'as'    => 'category-published'
    ]);


    Route::get('/category/edit/{id}', [
        'uses'  => 'CategoryController@editCategory',
        'as'    => 'category-edit'
    ]);
    Route::post('/category/update/', [
        'uses'  => 'CategoryController@updateCategory',
        'as'    => 'category-update'
    ]);
    Route::get('/category/delete/{id}', [
        'uses'  => 'CategoryController@deleteCategory',
        'as'    => 'category-delete'
    ]);



    Route::get('/brand/add', [
        'uses'  => 'BrandController@index',
        'as'    => 'brand-add'
    ]);
    Route::get('/brand/manage', [
        'uses'  => 'BrandController@manageBrand',
        'as'    => 'brand-manage'
    ]);
    Route::post('/brand/save', [
        'uses'  => 'BrandController@saveBrand',
        'as'    => 'brand-save'
    ]);


    Route::get('/brand/unpublished/{id}', [
        'uses'  => 'BrandController@unpublishedBrand',
        'as'    => 'brand-unpublished'
    ]);
    Route::get('/brand/published/{id}', [
        'uses'  => 'BrandController@publishedBrand',
        'as'    => 'brand-published'
    ]);
    Route::get('/brand/edit/{id}', [
        'uses'  => 'BrandController@editBrand',
        'as'    => 'brand-edit'
    ]);
    Route::post('/brand/update', [
        'uses'  => 'BrandController@updateBrand',
        'as'    => 'brand-update'
    ]);
    Route::get('/brand/delete/{id}', [
        'uses'  => 'BrandController@deleteBrand',
        'as'    => 'brand-delete'
    ]);


    Route::get('/product/add', [
        'uses'  => 'ProductController@index',
        'as'    => 'product-add'
    ]);
    Route::post('/product/save', [
        'uses'  => 'ProductController@saveProduct',
        'as'    => 'product-save'
    ]);
    Route::get('/product/manage', [
        'uses'  => 'ProductController@manageProduct',
        'as'    => 'product-manage'
    ]);
    Route::get('/product/unpublished', [
        'uses'  => 'ProductController@unpublishedProduct',
        'as'    => 'product-unpublished'
    ]);
    Route::get('/product/published', [
        'uses'  => 'ProductController@publishedProduct',
        'as'    => 'product-published'
    ]);
    Route::get('/product/edit/{id}', [
        'uses'  => 'ProductController@editProduct',
        'as'    => 'product-edit'
    ]);
    Route::post('/product/update', [
        'uses'  => 'ProductController@updateProduct',
        'as'    => 'product-update'
    ]);
    Route::get('/product/delete', [
        'uses'  => 'ProductController@deleteProduct',
        'as'    => 'product-delete'
    ]);


    Route::get('/order/manage-order', [
        'uses'  => 'OrderController@manageOrderInfo',
        'as'    => 'manage-order'
    ]);
    Route::get('/order/view-order-detail/{id}', [
        'uses'  => 'OrderController@viewOrderDetail',
        'as'    => 'view-order-detail'
    ]);
    Route::get('/order/view-order-invoice/{id}', [
        'uses'  => 'OrderController@viewOrderInvoice',
        'as'    => 'view-order-invoice'
    ]);
    Route::get('/order/download-order-invoice/{id}', [
        'uses'  => 'OrderController@downloadOrderInvoice',
        'as'    => 'download-order-invoice'
    ]);
    
    
});

Route::get('/ajax-email-check/{id}', [
    'uses'  => 'CheckoutController@ajaxEmailCheck',
    'as'    => 'ajax-email-check'
]);






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

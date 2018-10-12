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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'MyController@home')->name('');
Route::get('/category/{id}', 'MyController@category')->name('');
Route::get('/codes', 'MyController@codes')->name('');
Route::get('/contact', 'MyController@contact')->name('');
Route::get('/search', 'MyController@search')->name('');

Route::post('contact/submit', 'MyController@insertme')->name('');
Route::get('/single/{pro_id}', 'MyController@single')->name('');

// Cart Routes

Route::post('/add-to-cart', 'CartController@add_to_cart')->name('');
Route::get('/show-cart', 'CartController@show_cart')->name('');
Route::post('/update-cart', 'CartController@update_cart')->name('');
Route::get('/delete-cart/{rowId}', 'CartController@delete_cart')->name('');

// Checkout routes

Route::get('/checkout/sign-up', 'CheckoutController@sign_up')->name('');
Route::post('/checkout/register', 'CheckoutController@customer_register')->name('');
Route::get('/checkout/logout', 'CheckoutController@customer_logout')->name('');
Route::post('/checkout/login', 'CheckoutController@customer_login')->name('');
Route::get('/checkout/shipping', 'CheckoutController@customer_shipping')->name('');
Route::post('/checkout/shipping/save', 'CheckoutController@customer_shipping_save')->name('');

 // Payment Routes

Route::get('/checkout/payment', 'PaymentController@payment_page')->name('');
Route::post('/checkout/payment/save', 'PaymentController@payment_method_save')->name('');

//Paypal Routes

Route::get('/paypal', 'PaypalController@index')->name('');
Route::post('/paypal', 'PaypalController@payWithpaypal')->name('');
Route::get('/status', 'PaypalController@getPaymentStatus');
//
// //stripe Routes
// Route::get('/addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'AddMoneyController@payWithStripe'));
// Route::post('/addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));


Route::get('auth/google', 'ApiController@redirectToProviderGoogle');
Route::get('auth/google/callback', 'ApiController@handleProviderCallbackGoogle');


// admin routes

Route::get('/admin', 'AdminController@dashme')->name('');
Route::get('/admin/permission', 'AdminController@permission')->name('');
Route::get('admin/contact-message', 'ContactController@contactmess')->name('');
Route::get('admin/contact-message/mark/{conus_id}', 'ContactController@contactmark')->name('');

//password change
Route::get('admin/password/change', 'AdminController@changepassword')->name('password.change');
Route::post('admin/password/change/submit', 'AdminController@changepasswordsubmite')->name('password.change.submit');

Route::get('admin/all-users', 'AdminController@alluser')->name('');

// Category info
Route::get('admin/category/add', 'CategoryController@addcate')->name('');
Route::post('admin/category/save', 'CategoryController@storeCategory')->name('');
Route::get('admin/category/manage', 'CategoryController@manage')->name('');
Route::get('admin/category/edit/{id}', 'CategoryController@edit')->name('');
Route::post('admin/category/update', 'CategoryController@updateCategory')->name('');
Route::get('admin/category/delete/{id}', 'CategoryController@delete')->name('');
Route::get('admin/category/view/{id}', 'CategoryController@singleviewCategory')->name('');

// Category info


// manufacturer manufacturer Routes

Route::get('admin/manufacturer/add', 'ManufacturerController@addManufacturer')->name('');
Route::post('admin/manufacturer/save', 'ManufacturerController@insertManufacturer')->name('');
Route::get('admin/manufacturer/manage', 'ManufacturerController@viewManufacturer')->name('');
Route::get('admin/manufacturer/edit/{manu_id}', 'ManufacturerController@editManufacturer')->name('');
Route::post('admin/manufacturer/edit/submit', 'ManufacturerController@editsubmitManufacturer')->name('');
Route::get('admin/manufacturer/delete/{manu_id}', 'ManufacturerController@deleteManufacturer')->name('');
Route::get('admin/manufacturer/singleview/{manu_id}', 'ManufacturerController@singleviewManufacturer')->name('');

// Admin Manufacturer Routes

// Admin product Routes

Route::get('admin/product/add', 'ProductController@addProduct')->name('');
Route::post('admin/product/save', 'ProductController@insertProduct')->name('');
Route::get('admin/product/manage', 'ProductController@manageProduct')->name('');
Route::get('admin/product/edit/{pro_id}', 'ProductController@editProduct')->name('');
Route::post('admin/product/update', 'ProductController@updateProduct')->name('');
Route::get('admin/product/delete/{pro_id}', 'ProductController@deleteProduct')->name('');
Route::get('admin/product/view/{pro_id}', 'ProductController@viewProduct')->name('');

// Admin product Routes


// Admin product Routes

Route::get('admin/order-manange', 'OrderController@manageOrder')->name('');
Route::get('admin/order/view/{order_id}', 'OrderController@viewOrder')->name('');
Route::get('admin/order/done/{order_id}', 'OrderController@doneOrder')->name('');
Route::get('admin/order/delete/{order_id}', 'OrderController@deleteOrder')->name('');

Route::get('admin/order/invoice/{order_id}', 'PaymentController@invoice')->name('');

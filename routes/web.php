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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/taskAdmin/login','AdminLoginController@showLogin')->name('show-admin-login');
    Route::post('/admin/login','AdminLoginController@login')->name('admin-login');
    Route::post('/admin/logout','AdminLoginController@logout')->name('admin-logout');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/dashboard','AdminDashboardController')->name('dashboard');
    Route::get('/','AdminController@index')->name('admins');
    Route::get('/customers','ViewCustomersController')->name('users');
    Route::put('/customer/update/status/{id}','ActiveDeactiveUserController')->name('active-deactive-user');
    Route::get('/create','AdminController@create')->name('add-admin');
    Route::post('/store','AdminController@store')->name('store-admin');
    Route::delete('/delete/{id}','AdminController@destroy')->name('delete-admin');

    Route::get('/languages','LanguageController@index')->name('languages');
    Route::get('/language/create','LanguageController@create')->name('add-language');
    Route::post('/language/store','LanguageController@store')->name('store-language');

    Route::get('/products','ProductController@index')->name('products');
    Route::get('/product/create','ProductController@create')->name('add-product');
    Route::post('/product/store','ProductController@store')->name('store-product');
    Route::get('/product/view/{id}','ProductController@view')->name('view-product');
    Route::put('/product/update/{id}','ProductController@update')->name('update-product');
    Route::delete('/product/delete/{id}','ProductController@destroy')->name('delete-product');
});

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::group(['namespace' => 'Web'], function () {
    Route::get('/register','UserLoginController@showRegister')->name('show-register-user');
    Route::post('/register','UserLoginController@register')->name('register-user');
    Route::get('/login','UserLoginController@showLogin')->name('show-user-login');
    Route::post('/login','UserLoginController@login')->name('user-login');
    Route::post('/logout','UserLoginController@logout')->name('user-logout');

    Route::group(['middleware'=> ['auth'],'throttle:rate_limit,30'], function () {
        Route::get('/home','HomeController@index')->name('home-page');
    });
});

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


//首頁
Route::get('/', 'FrontController@index');

Route::resource('user', 'UserController');

//最新消息
Route::get('/news', 'FrontController@news');
Route::get('/news/{id}','FrontController@news_detail');

//產品頁面
Route::get('/products', 'FrontController@products');
Route::get('/products/{id}', 'FrontController@products_detail');

Auth::routes();

//後台



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){

    Route::get('/', 'adminController@index')->name('home');

    Route::get('product', 'ProductController@index');
    Route::get('product/create', 'ProductController@create');
    Route::post('product/store', 'ProductController@store');
    Route::get('product/edit/{id}', 'ProductController@edit');
    Route::post('product/update/{id}', 'ProductController@update');
    Route::post('product/destroy/{id}', 'ProductController@destroy');

    Route::get('news', 'NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news/store', 'NewsController@store');
    Route::get('news/edit/{id}', 'NewsController@edit');
    Route::post('news/update/{id}', 'NewsController@update');
    Route::post('news/destroy/{id}', 'NewsController@destroy');

});



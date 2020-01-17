<?php

use Illuminate\Support\Facades\Auth;

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
Route::get('/news/{id}', 'FrontController@news_detail');

//產品頁面
Route::get('/area', 'FrontController@area');
Route::get('/area/{id}', 'FrontController@products_detail');

// 關於我們
Route::get('/about', 'FrontController@about');

// 聯繫我們
Route::get('/contact', 'FrontController@contact');

// 購物車

Auth::routes();

//後台
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'adminController@index')->name('home');

    // map 地圖管理, 資料固定故不能新增編輯
    Route::get('map', 'MapController@index');
    // Route::get('product/create', 'ProductController@create');
    // Route::post('product/store', 'ProductController@store');
    // Route::get('product/edit/{id}', 'ProductController@edit');
    // Route::post('product/update/{id}', 'ProductController@update');
    // Route::post('product/destroy/{id}', 'ProductController@destroy');

    // area 地區管理
    Route::get('area', 'AreaController@index');
    Route::get('area/create', 'AreaController@create');
    Route::post('area/store', 'AreaController@store');
    Route::get('area/edit/{id}', 'AreaController@edit');
    Route::post('area/update/{id}', 'AreaController@update');
    Route::post('area/destroy/{id}', 'AreaController@destroy');

    // area content 地區內容管理
    Route::get('area_content', 'AreaContentController@index');
    Route::get('area_content/create', 'AreaContentController@create');
    Route::post('area_content/store', 'AreaContentController@store');
    Route::get('area_content/edit/{id}', 'AreaContentController@edit');
    Route::post('area_content/update/{id}', 'AreaContentController@update');
    Route::post('area_content/destroy/{id}', 'AreaContentController@destroy');

    // news
    Route::get('news', 'NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news/store', 'NewsController@store');
    Route::get('news/edit/{id}', 'NewsController@edit');
    Route::post('news/update/{id}', 'NewsController@update');
    Route::post('news/destroy/{id}', 'NewsController@destroy');

    // 訂單管理
    Route::get('/order', 'OrderController@index');
    Route::get('/order/detail/{order_no}', 'OrderController@detail');
    Route::post('/order/destroy/{order_no}', 'OrderController@destroy');
    Route::get('/order/select/{status}', 'OrderController@select'); // 訂單篩選
    Route::post('/orderChangeStatus/{order_no}', 'OrderController@changeStatus'); //修改訂單狀態


});

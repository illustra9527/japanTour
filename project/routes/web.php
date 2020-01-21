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

// 會員資料
Route::post('/user_detail/{id}', function(){
    return view('front.user_detail');
});


// 購物車

Auth::routes();

//後台
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', 'adminController@index')->name('home');

    // map 地圖管理, 資料固定故不能新增編輯
    Route::get('map', 'MapController@index');


    // area 地區管理
    Route::get('area', 'AreaController@index');
    Route::get('area/create', 'AreaController@create');
    Route::post('area/store', 'AreaController@store');
    Route::get('area/edit/{id}', 'AreaController@edit');
    Route::post('area/update/{id}', 'AreaController@update');
    Route::post('area/destroy/{id}', 'AreaController@destroy');

    Route::post('/ajax_delete_banner_imgs', 'AreaController@ajax_delete_banner_imgs');  //多張小圖片排序和刪除
    Route::post('/imgs_change_sort', 'AreaController@imgs_change_sort');  //多張小圖片排序和刪除

    //product_type 產品分類管理
    Route::get('product_type', 'ProductTypeController@index');
    Route::get('product_type/create', 'ProductTypeController@create');
    Route::post('product_type/store', 'ProductTypeController@store');
    Route::get('product_type/edit/{id}', 'ProductTypeController@edit');
    Route::post('product_type/update/{id}', 'ProductTypeController@update');
    Route::post('product_type/destroy/{id}', 'ProductTypeController@destroy');

    //product_content 產品內容管理
    Route::get('product_content', 'ProductContentController@index');
    Route::get('product_content/create', 'ProductContentController@create');
    Route::post('product_content/store', 'ProductContentController@store');
    Route::get('product_content/edit/{id}', 'ProductContentController@edit');
    Route::post('product_content/update/{id}', 'ProductContentController@update');
    Route::post('product_content/destroy/{id}', 'ProductContentController@destroy');

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'super_admin']], function () {

    //帳號管理
    Route::get('/account', 'AccountController@index');
    Route::get('/account/create', 'AccountController@create');
    Route::post('/account/store', 'AccountController@store');
    Route::get('/account/edit/{id}', 'AccountController@edit');
    Route::post('/account/update/{id}', 'AccountController@update');
    Route::post('/account/destroy/{id}', 'AccountController@destroy');

    Route::get('/account/select/{role}', 'AccountController@select');

    //會員管理
    Route::get('/user_detail', 'UserDetailController@index');
    Route::get('/user_detail/{id}', 'UserDetailController@detail');
    Route::post('/user_detail/update/{id}', 'UserDetailController@update');
    Route::post('/user_detail/destroy/{id}', 'UserDetailController@destroy');
});

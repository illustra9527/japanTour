<?php

use App\ProductContent;
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
Route::get('/area/{id}', 'FrontController@area');
Route::get('/content/{id}', 'FrontController@content');

// Route::resource('user', 'UserController');

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






// 註冊後轉跳detail填寫
Route::get('/user_detail_input', 'FrontController@user_detail_input')->middleware('auth'); //進入購物車 (需要登入)

// 會員資料 index
Route::get('/user_detail/{id}', 'FrontController@user_detail');
// 會員詳細資料儲存
Route::post('/user_detail_input/store', 'FrontController@user_detail_store');
// 會員修改會員資料
Route::post('/user_detail/update/{id}', 'FrontController@user_detail_update');


// 購物車
Route::get('/cart', 'CartController@cart')->middleware('auth'); //進入購物車 (需要登入)

Route::post('/addCart', 'CartController@addCart'); //加入購物車
Route::post('/cartQtyAdd', 'CartController@cartQtyAdd'); // 商品 +1按鈕
Route::post('/cartQtyMinus', 'CartController@cartQtyMinus'); // 商品 -1按鈕
Route::post('/cartQtyChange', 'CartController@cartQtyChange'); // 商品數量修改
Route::post('/cartDelete', 'CartController@cartDelete'); // 商品數量刪除
Route::get('/cartCheck', 'CartController@cartCheck'); // 結帳輸入購買資訊
Route::post('/cartPayment', 'CartController@cartPayment'); // 存訂單 帶金流
Route::get('/cartPaid/{order_no}', 'CartController@cartPaid'); // 完成結帳畫面

// for test (Cart)

Route::group(['prefix' => 'test', 'middleware' => ['auth']], function () {

    Route::get('/product', function () {

        $products = ProductContent::all();

        return view('front.test.product', compact('products'));
    });

    Route::get('/cart', function () {
        $userId = auth()->user()->id;
        $contents = \Cart::session($userId)->getContent()->sort();
        $total = \Cart::session($userId)->getTotal();

        return view('front.test.cart', compact('contents', 'total'));
    })->middleware('auth'); //進入購物車 (需要登入)

    // Route::get('/product', function () {

    //     $products = ProductContent::all();

    //     return view('front.test.product', compact('products'));
    // });

    Route::get('/clean', function () {

        $userId = auth()->user()->id;
        \Cart::session($userId)->clear();

        return redirect()->back();
    });
});

// 串接金流

Route::prefix('cart_ecpay')->group(function () {

    //當消費者付款完成後，綠界會將付款結果參數以幕後(Server POST)回傳到該網址。
    Route::post('notify', 'CartController@notifyUrl')->name('notify');

    //付款完成後，綠界會將付款結果參數以幕前(Client POST)回傳到該網址
    Route::post('return', 'CartController@returnUrl')->name('return');
});




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

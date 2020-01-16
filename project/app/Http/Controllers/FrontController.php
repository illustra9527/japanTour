<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //index
    public function index(){

        $swipers = DB::table('swiper')->get();
        $products = DB::table('products')->get();
        $news = DB::table('news')->orderBy('id', 'desc')->take(3)->get();
        // orderBy('欄位','排法'); 排法: asc -> 由小到大(預設), desc -> 由大到小
        // take() 取幾筆, 不能省略get();
        return view('front.index', compact('swipers','products','news'));
    }


    /* public function swipers(){
        $swipers = DB::table('swiper')->get();

        return view('front.index', compact('swipers'));
    } */

  /*   public function index_products(){
        $index_products = DB::table('products')->orderBy('id', 'desc')->take(5)->get();

        return view('front.index', compact('index_products'));
    } */

    // db 要匯入哪一頁，就把匯入及compact寫在那一個controller就好
    // 若用不同的controller 匯入同一頁就會發生錯誤

    public function news(){

        $news = DB::table('news')->paginate(5);
        // 加入分頁, 把news（未過濾） 的 get() 改成 simplePaginate(5); 5為顯示數量
        // 並在view裡面加入 {{ $news->links() }};
        // simplePagination -> 只有上一頁下一頁按鈕選項
        // paginate -> 樣式不同，且多了頁數
        return view('front.news', compact('news'));
    }

    public function news_detail($id){

        $new = DB::table('news')->find($id);
        return view('front.news_detail', compact('new'));
    }

    public function products(){

        $products = DB::table('products')->get();

        return view('front.products', compact('products'));
    }

    public function products_detail($id){

        $product = DB::table('products')->where('id',$id)->first();

        return view('front.products_detail', compact('product'));
    }
}

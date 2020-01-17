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



    public function news(){

        $news = News::get()->paginate(5);

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //index
    public function index()
    {
        return view('front.index');
    }



    public function news()
    {
    }

    public function news_detail($id)
    {
    }

    public function products()
    {
    }

    public function products_detail($id)
    {
    }
}

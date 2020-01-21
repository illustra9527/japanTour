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

    public function area()
    {
        return view('front.area');
    }

    public function content()
    {
        return view('front.content');
    }

}

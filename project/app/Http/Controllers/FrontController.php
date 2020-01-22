<?php

namespace App\Http\Controllers;

use App\Map;
use App\Area;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //index
    public function index()
    {
        $maps =  Map::all();
        return view('front.index', compact('maps'));
    }

    public function area($id)
    {
        $area = Area::where('id', $id)->with('map')->first();
        return view('front.area', compact('area'));
    }

    public function content($id)
    {
        $area =  Area::where('id', $id)->with('area_banners')->first();
        $product_type = ProductType::where('id', $id)->with('product_contents')->first();
        return view('front.area_content', compact('area', 'product_type'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {

        $items = Map::all();
        return view('admin.map.index', compact('items'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Map;
use App\Area;
use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{

    public function index()
    {
        $items = ProductType::with('area')->get();
        return view('admin.product_type.index', compact('items'));
    }

    public function create()
    {
        $areas = Area::all();
        $items = ProductType::all();
        return view('admin.product_type.create', compact('items','areas'));
    }

    public function store(Request $request)
    {
        ProductType::create($request->all());
        return redirect('/admin/product_type');
    }


    public function edit($id)
    {
        $areas = Area::all();
        $item = ProductType::find($id);
        return view('admin.product_type.edit', compact('item','areas'));
    }


    public function update(Request $request, $id)
    {
        $item = ProductType::find($id);
        $item->update($request->all());
        return redirect('/admin/product_type');
    }


    public function destroy($id)
    {
        ProductType::destroy($id);
        return redirect('/admin/product_type');
    }
}

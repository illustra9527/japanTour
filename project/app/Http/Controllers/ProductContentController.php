<?php

namespace App\Http\Controllers;

use App\Area;
use App\ProductType;
use App\ProductContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductContentController extends Controller
{
    public function index()
    {
        $items = ProductContent::with('product_type')->get();
        return view('admin.product_content.index', compact('items'));
    }

    public function create()
    {
        $items = ProductType::get();
        // dd( $items);
        return view('admin.product_content.create', compact('items'));
    }

    public function store(Request $request)
    {
        //FOR 圖片上傳
        $requsetData = $request->all();
        //上傳檔案
        $file_name = $request->file('img')->store('product_img', 'public');
        $requsetData['img'] = $file_name;
        ProductContent::create($requsetData);
        return redirect('/admin/product_content');
    }

    public function edit($id)
    {
        $areas =  Area::with('product_types')->get();
        $item = ProductContent::find($id);
        return view('admin.product_content.edit', compact('item', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $item = ProductContent::find($id);
        $requsetData = $request->all();
        // dd($requsetData);
        if ($request->hasFile('img')) {
            $old_image = $item->img; //舊的圖片
            File::delete(public_path() . '/storage/' . $old_image); //刪除舊的圖片
            $file_name = $request->file('img')->store('product_img', 'public'); //上傳新的圖片
            $requsetData['img'] = $file_name;
        }

        $item = ProductContent::find($id);
        $item->update($requsetData);
        return redirect('/admin/product_content');
    }

    public function destroy($id)
    {
        $item = ProductContent::find($id);
        $old_image = $item->img; //舊的圖片
        Storage::disk("public")->delete($old_image);
        ProductContent::destroy($id);
        return redirect('admin/product_content');
    }
}

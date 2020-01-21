<?php

namespace App\Http\Controllers;

use App\ProductContent;
use Illuminate\Http\Request;

class ProductContentController extends Controller
{
    public function index()
    {
        $items = ProductContent::with('area')->get();
        return view('admin.product_content.index', compact('items'));
    }

    public function create()
    {
        $items = ProductContent::with('area_contents')->get();
        return view('admin.area_content.create', compact('items'));
    }

    public function store(Request $request)
    {

        //FOR 圖片上傳
        $requsetData = $request->all();
        //上傳檔案
        $file_name = $request->file('img')->store('one_images', 'public');
        $requsetData['img'] = $file_name;

        //多個檔案
        $product_item = ProductContent::create($requsetData);;  //抓產品資料
        $newproduct_id = $product_item->id;  //讓產品資料ID=PRODUCT_ID
        $files = $request->file('imgs');  //抓取上傳的檔案 (陣列) imgs欄位


        if ($request->hasFile('imgs')) {   //假如有檔案才執行
            foreach ($files as $file) {   //迴圈抓出單一的file (物件)
                $path = $file->store('more_images', 'public');  //上傳圖片/抓取圖片路徑+建立資料夾
                $product_img = new Product_img;   //新增資料進DB (MODEL) 新MODEL(空的)
                $product_img->product_id = $newproduct_id;  //指向MODEL裡的PRODUCT_ID 會等於 產品的ID
                $product_img->img = $path;  //指向裡面的IMG 會等於 圖片路徑
                $product_img->save();  //儲存
            }
        }

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $areas =  Area::with('area_contents')->get();
        $item = AreaContent::find($id);
        return view('admin.area_content.edit', compact('item', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $item = AreaContent::find($id);
        $item->update($request->all());
        return redirect('/admin/area_content');
    }

    public function destroy($id)
    {
        $item = AreaContent::find($id);
        $old_image = $item->img; //舊的圖片
        Storage::disk("public")->delete($old_image);
        AreaContent::destroy($id);
        return redirect('admin/area_content');
    }
}

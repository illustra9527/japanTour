<?php

namespace App\Http\Controllers;

use App\Map;
use App\Area;
use App\AreaBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{
    public function index()
    {
        $items = Area::with('map')->get();
        return view('admin.area.index', compact('items'));
    }

    public function create()
    {
        $maps = Map::all();
        return view('admin.area.create', compact('maps'));
    }

    public function store(Request $request)
    {
        //FOR 圖片上傳
        $requsetData = $request->all();
        //上傳檔案
        $file_name = $request->file('img')->store('area_img', 'public');
        $requsetData['img'] = $file_name;

        //多個檔案
        $area_item = Area::create($requsetData);;  //抓產品資料
        $new_id = $area_item->id;  //讓產品資料ID=PRODUCT_ID
        $files = $request->file('imgs');  //抓取上傳的檔案 (陣列) imgs欄位


        if ($request->hasFile('imgs')) {   //假如有檔案才執行
            foreach ($files as $file) {   //迴圈抓出單一的file (物件)
                $path = $file->store('area_banners', 'public');  //上傳圖片/抓取圖片路徑+建立資料夾
                $area_imgs = new AreaBanner;   //新增資料進DB (MODEL) 新MODEL(空的)
                $area_imgs->area_id = $new_id;  //指向MODEL裡的AREA_ID 會等於 產品的ID
                $area_imgs->imgs = $path;  //指向裡面的IMG 會等於 圖片路徑
                $area_imgs->save();  //儲存
            }
        }
        $banner_imgs = Area::where('id', $new_id)->with('area_banners')->first();
        $banner_imgs->save();

        return redirect('/admin/area');
    }

    public function edit($id)
    {
        $maps = Map::all();
        $item = Area::with('map')->find($id);
        $banners = AreaBanner::all();
        return view('admin.area.edit', compact('item', 'maps', 'banners'));
    }

    public function update(Request $request, $id)
    {

        $item = Area::find($id);
        // $old_image = $item->img; //舊的圖片
        // dd($old_image);
        $requsetData = $request->all();
        if ($request->hasFile('img')) {
            $old_image = $item->img; //舊的圖片
            File::delete(public_path() . '/storage/' . $old_image); //刪除舊的圖片
            $file_name = $request->file('img')->store('area_img', 'public'); //上傳新的圖片
            $requsetData['img'] = $file_name;
            $item->update($requsetData);
        }

        //多個檔案
        $files = $request->file('imgs');  //抓取上傳的檔案 (陣列) imgs欄位
        if ($request->hasFile('imgs')) {   //假如有檔案才執行

            $items = AreaBanner::where('area_id', $id)->get();
            foreach ($items as $item) {
                $old_images = $item->imgs;
                File::delete(public_path() . '/storage/' . $old_images); //刪除舊的圖片
                $item->delete();
            }

            foreach ($files as $file) {   //迴圈抓出單一的file (物件)

                $path =  $file->store('area_banners', 'public'); //上傳圖片/抓取圖片路徑+建立資料夾
                $area_imgs = new AreaBanner;   //新增資料進DB (MODEL) 新MODEL(空的)
                $area_imgs->area_id = $id;  //指向MODEL裡的PRODUCT_ID 會等於 產品的ID
                $area_imgs->imgs = $path;  //指向裡面的IMG 會等於 圖片路徑
                $area_imgs->save();  //儲存
            }
        }

        $item->update($requsetData);
        return redirect('/admin/area');
    }



    public function destroy($id)
    {
        $item = Area::find($id);
        $old_image = $item->img; //舊的圖片
        Storage::disk("public")->delete($old_image);
        Area::destroy($id);

        //多張
        $area_imgs = AreaBanner::where('area_id', $id)->get();
        foreach ($area_imgs as $area_img) {
            // dd($area_img);
            $old_banner_img = $area_img->imgs;
            if (file_exists(public_path() . '/storage/' . $old_banner_img)) {
                Storage::disk("public")->delete($old_banner_img);
            }

            $area_img->delete();
        }

        return redirect('/admin/area');
    }







    public function ajax_delete_banner_imgs(Request $request)
    {
        $banner_imgs_id = $request->banner_imgs_id;

        //多張圖片組的單一圖片刪除
        $banner_img = AreaBanner::where('id', $banner_imgs_id)->first();
        $old_product_img = $banner_img->imgs;
        if (file_exists(public_path() . '/storage/' . $old_product_img)) {
            File::delete(public_path() . '/storage/' . $old_product_img);
        }
        $banner_img->delete();
        echo '{"status":"success","message":"delete file success"}';
    }

    public function imgs_change_sort(Request $request)
    {
        $banner_imgs_id = $request->banner_imgs_id;  //把AJAX的數值抓出來
        $banner_imgs_value = $request->banner_imgs_value;  //把AJAX的數值抓出來

        $BannerImg =  AreaBanner::find($banner_imgs_id);  //更新上去資料庫
        $BannerImg->sort = $banner_imgs_value;
        $BannerImg->save();
        echo '{"status":"success","message":"sort change success"}';
    }
}

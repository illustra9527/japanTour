<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AreaContentController extends Controller
{
    public function index()
    {
        $items = AreaContent::with('area')->get();
        return view('admin.area_content.index', compact('items'));
    }

    public function create()
    {
        $items = Area::with('area_contents')->get();
        return view('admin.area_content.create', compact('items'));
    }

    public function store(Request $request)
    {

        //FOR 圖片上傳
        $requsetData = $request->all();
        //上傳檔案
        $file_name = $request->file('img')->store('Area_content_img', 'public');
        $requsetData['img'] = $file_name;
        AreaContent::create($requsetData);
        return redirect('/admin/area_content');
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

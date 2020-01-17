<?php

namespace App\Http\Controllers;

use App\AreaContent;
use Illuminate\Http\Request;

class AreaContentController extends Controller
{
    public function index()
    {
        $items = AreaContent::all();
        return view('admin.area_content.index', compact('items'));
    }

    public function create()
    {

        return view('admin.area_content.create');
    }

    public function store(Request $request)
    {

        AreaContent::create($request->all());

        return redirect('/admin/area_content');
    }

    public function edit($id){

        $item = AreaContent::find($id);
        return view('admin.area_content.edit', compact('item'));

    }

    public function update(Request $request, $id){

        $item = AreaContent::find($id);
        $item->update($request->all());

        return redirect('admin/area_content');

    }

    public function destroy($id){

        AreaContent::destroy($id);
        return redirect('admin/area_content');
    }
}

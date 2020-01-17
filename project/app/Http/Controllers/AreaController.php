<?php

namespace App\Http\Controllers;

use App\Map;
use App\Area;
use Illuminate\Http\Request;

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

        Area::create($request->all());

        return redirect('/admin/area');
    }

    public function edit($id)
    {
        $maps = Map::all();
        $item = Area::with('map')->find($id);
        return view('admin.area.edit', compact('item','maps' ));
    }

    public function update(Request $request, $id)
    {

        $item = Area::find($id);
        $item->update($request->all());
        return redirect('/admin/area');

    }

    public function destroy($id)
    {
        Area::destroy($id);
        return redirect('/admin/area');
    }
}

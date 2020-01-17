<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    // TO DO: Need to create News table and Model, then use it.
    public function index()
    {
        $items =News::all();

        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {

        News::create($request->all());

        return redirect('/admin/news');
    }

    public function edit($id)
    {
        $item = News::find($id);
        return view('admin.news.edit', compact('news_types'));
    }

    public function update(Request $request, $id)
    {

        $item = News::find($id);
        $item->update($request->all());
        return redirect('/admin/news');

    }

    public function destroy($id)
    {
        News::destroy($id);
        return redirect('/admin/news');
    }

}

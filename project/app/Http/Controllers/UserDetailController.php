<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index(){
        $users = UserDetail::with('user')->get();

        return view('admin.user_detail.index', compact('users'));
    }


    public function detail($id){
        $item = UserDetail::find($id);

        return view('admin.user_detail.detail', compact('item'));
    }


    public function update(Request $request, $id){

    }


    public function destroy(){

    }
}

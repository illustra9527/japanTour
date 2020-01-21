<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index(){
        // $users = UserDetail::with('user')->get();
        $users = User::where('role', 'user')->with('user_detail')->get();


        return view('admin.user_detail.index', compact('users'));
    }


    public function detail($id){
        $item = User::with('user_detail')->find($id);
        // 用User ID 去找detail, View裡面的詳細資料要再指進去
        return view('admin.user_detail.detail', compact('item'));
    }


    public function destroy($id){


        UserDetail::destroy($id);

        return redirect('admin/user_detail');
    }
}

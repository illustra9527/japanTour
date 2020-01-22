<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //index
    public function index()
    {
        //
    }



    public function news()
    {
        //
    }

    public function news_detail($id)
    {
        //
    }

    public function products()
    {
        //
    }

    public function products_detail($id)
    {
        //
    }

    /* USER */
    public function user($id)
    {
        $user = User::find($id);

        return view('front.user');
    }

    public function user_detail($id)
    {
        $user = User::with('user_detail')->find($id);

        return view('front.user_detail', compact('user'));
    }

    public function user_detail_input()
    {
        // 註冊後轉跳的輸入頁面
        return view('front.user_detail_input');
    }

    public function user_detail_store(Request $request)
    {
        // 儲存會員資料
        $userId = auth()->user()->id;
        $requestData = $request->all();

        $user_detil = new UserDetail();
        $user_detil->user_id = $userId;
        // dd($user_detil->id_number);
        $user_detil->phone = $requestData['phone'];
        $user_detil->first_name = $requestData['first_name'];
        $user_detil->last_name = $requestData['last_name'];
        $user_detil->gender = $requestData['gender'];
        $user_detil->passport_number = $requestData['passport_number'];
        $user_detil->id_number = $requestData['id_number'];
        $user_detil->save();


        return redirect('/test/product');
    }


}

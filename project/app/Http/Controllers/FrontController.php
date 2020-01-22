<?php

namespace App\Http\Controllers;

use App\Map;
use App\Area;
use App\ProductType;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //index
    public function index()
    {
        $maps =  Map::all();
        return view('front.index', compact('maps'));
    }

    public function area($id)
    {
        $area = Area::where('id', $id)->with('map')->first();
        return view('front.area', compact('area'));
    }

    public function content($id)
    {
        $area =  Area::where('id', $id)->with('area_banners')->first();
        $product_type = ProductType::where('id', $id)->with('product_contents')->first();
        return view('front.area_content', compact('area', 'product_type'));
    }

    /* USER */

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


        return redirect('/');
    }


    public function user_detail_update(Request $request, $id)
    {
        // 會員修改會員資料

        $user = UserDetail::find($id);
        $user->update($request->all());

        return redirect()->back();
    }



}

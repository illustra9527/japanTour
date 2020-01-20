<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $items = Order::all();


        return view('admin.order.index', compact('items'));
    }


    public function detail($order_no){

        $order = Order::where('order_no',$order_no)->with('order_items')->first();

        return view('admin.order.detail', compact('order'));
    }


    public function destroy(Request $request, $order_no){

        $order = Order::where('order_no',$order_no)->first();
        $order_items = OrderItem::where('order_id',$order->id)->get();

        foreach ($order_items as $item) {

            $item->delete();
        };

        $order->delete();
        return redirect()->back();

    }

    public function select($status){

        $items = Order::where('status',$status)->get();

        return view('admin.order.index', compact('items'));
    }

    public function changeStatus(Request $request, $order_no){

        $order = Order::where('order_no', $order_no)->first();

        $order->status = 'OrderDone';
        $order->save();

        return redirect()->back();


    }
}

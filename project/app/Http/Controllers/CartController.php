<?php

namespace App\Http\Controllers;

use App\ProductContent;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function cart()
    {

        $userId = auth()->user()->id;
        $contents = \Cart::session($userId)->getContent()->sort();
        $total = \Cart::session($userId)->getTotal();


        return view('front.cart', compact('contents', 'total'));
    }

    public function addCart(Request $request)
    {

        $product_id = $request->product_id;
        $product = ProductContent::find($product_id);

        // add cart items to a specific user
        $userId = auth()->user()->id; // or any string represents user identifier
        \Cart::session($userId)->add($product->id, $product->title, $product->price, 1, array());

        $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();

        return $cartTotalQuantity;
    }


    public function cartQtyAdd(Request $request)
    {

        $userId = auth()->user()->id;
        $product_id = $request->product_id;

        \Cart::session($userId)->update($product_id, array(
            'quantity' => 1,
        ));

        return "success";
    }

    public function cartQtyMinus(Request $request)
    {

        $userId = auth()->user()->id;
        $product_id = $request->product_id;

        \Cart::session($userId)->update($product_id, array(
            'quantity' => -1,
        ));

        return "success";
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Carbon\Carbon;
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

    public function cartQtyChange(Request $request)
    {

        $userId = auth()->user()->id;
        $product_id = $request->product_id;
        $new_qty = $request->new_qty;

        // NOTE: as you can see by default, the quantity update is relative to its current value
        // if you want to just totally replace the quantity instead of incrementing or decrementing its current quantity value
        // you can pass an array in quantity value like so:
        \Cart::session($userId)->update($product_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $new_qty
            ),
        ));


        return "success";
    }

    public function cartDelete(Request $request)
    {

        $product_id = $request->product_id;
        $userId = auth()->user()->id; // or any string represents user identifier
        \Cart::session($userId)->remove($product_id);

        return "success";
    }


    public function cartCheck()
    {

        $userId = auth()->user()->id;
        $contents = \Cart::session($userId)->getContent()->sort();
        $total = \Cart::session($userId)->getTotal();


        return view('front.cartCheck', compact('contents', 'total'));
    }



    public function cartPayment(Request $request)
    {
        // 建立訂單
        $userId = auth()->user()->id;
        $requestData = $request->all();

        $requestData['order_no'] = Carbon::now()->format('Ymd');
        $requestData['total_price'] = \Cart::session($userId)->getTotal();


        $new_order = Order::create($requestData);
        $new_order->order_no = 'ddb' . Carbon::now()->format('Ymd') . $new_order->id;
        $new_order->save();

        $contents = \Cart::session($userId)->getContent()->sort();

        $items = []; // 要先創一個空的array 待會要用來存然後丟去金流
        // 把購物車裡面的項目一個個抓出來存

        foreach ($contents as $item) {

            $OrderItem = new OrderItem();
            $OrderItem->order_id = $new_order->id;
            $OrderItem->product_id = $item->id;
            $OrderItem->qty = $item->quantity;
            $OrderItem->price = $item->price;
            $OrderItem->save();

            $product = Product::find($item->id);
            $product_name = $product->title;

            $new_ary = [
                'name' => $product_name,
                'qty' => $item->quantity,
                'price' => $item->price,
                'unit' => '個'
            ];

            array_push($items, $new_ary);
        }

        //第三方支付
        $formData = [
            'UserId' => 1, // 用戶ID , Optional
            'ItemDescription' => '產品簡介',
            'Items' => $items,
            'OrderId' => 'ddb' . Carbon::now()->format('Ymd') . $new_order->id,
            // 'ItemName' => 'Product Name',
            // 'TotalAmount' => \Cart::getTotal(),
            'PaymentMethod' => 'Credit', // ALL, Credit, ATM, WebATM
        ];
        //清空購物車
        \Cart::session($userId)->clear();

        // 把資料送過去給金流
        return $this->checkout->setNotifyUrl(route('notify'))->setReturnUrl(route('return'))->setPostData($formData)->send();


    }

    // 從 ECpay套件中的ECPayController複製過來

    public function notifyUrl(Request $request)
    {
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            return '1|OK';
        } else {
            return '0|FAIL';
        }
    }

    public function returnUrl(Request $request)
    {
        $serverPost = $request->post();
        $checkMacValue = $request->post('CheckMacValue');
        unset($serverPost['CheckMacValue']);
        $checkCode = StringService::checkMacValueGenerator($serverPost);
        if ($checkMacValue == $checkCode) {
            if (!empty($request->input('redirect'))) {
                return redirect($request->input('redirect'));
            } else {

                //付款完成，下面接下來要將購物車訂單狀態改為已付款
                //目前是顯示所有資料將其DD出來

                $order_no = $serverPost['MerchantTradeNo'];

                $item = Order::where('order_no', $order_no)->first();
                $item->status = 'order_paid';
                $item->save();

                return redirect("/cartPaid/{$order_no}");
                //    dd($this->checkoutResponse->collectResponse($serverPost));
            }
        }
    }

    public function cartPaid($order_no)
    {

        $new_contents = Order::where('order_no', $order_no)->with('orderItems')->first();

        return view('front.cartPaid', compact('new_contents'));
    }
}

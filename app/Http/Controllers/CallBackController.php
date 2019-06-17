<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Services\NextPay\NextPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class CallBackController extends Controller
{
    public function show()
    {
        $nextpay = new NextPay();
        $trans_id = Input::get('trans_id');
        $order_id = Input::get('order_id');

        abort_if(Order::where('trans_id', $trans_id)->count() <> 1, 410);

        $nextpay->setTransId($trans_id);
        $nextpay->setOrderId($order_id);
        $trans = $nextpay->getTransaction($trans_id, $order_id);
        $nextpay->setAmount($trans->price);
        $nextpay->setApiKey(config('payment.nextpay_api', 'None'));
        $status = $nextpay->verify_request();
        switch ($status) {
            case 0:
                $status = "موفق";
                break;
            case -1:
                $status = "در انتظار واریز";
                break;
            default:
                $status = "ناموفق";
                break;
        }
        $trans_id = $nextpay->getTransId();
        $order = $this->addToOrdersTables($nextpay, $status, $trans_id, $order_id);
        Mail::send(new OrderPlaced($order));


        // decrease the quantities of all the products in the cart
        $this->decreaseQuantities();

        Cart::instance('default')->destroy();
        session()->forget('coupon');

        return view('callback', compact('order_id', 'trans_id', 'status'));
    }



    protected function addToOrdersTables($nextpay, $status, $trans_id, $order_id)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user()->id ?? null,
            'gateway' => config('payment.gateway', 'digijoo'),
            'status' => $nextpay->verify_request(),
            'trans_id' => $trans_id,
            'card_number' => $order_id,
            'ip' => \request()->ip(),
            'payment_date' => now(),
            'price' => getNumbers()->get('newSubtotal'),
            'discount' => getNumbers()->get('discount'),
            'discount_code' => getNumbers()->get('code'),
            'tax' => getNumbers()->get('newTax'),
            'total' => getNumbers()->get('newTotal'),
            'error' => $status,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }


    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }
}

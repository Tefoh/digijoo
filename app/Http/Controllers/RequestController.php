<?php

namespace App\Http\Controllers;

use App\Product;
use App\Services\NextPay\NextPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function show()
    {

        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('متاسفانه یکی از کالاهای سبد کالای شما موجود نمیباشد.');
        }

        try {
            $nextpay = new NextPay();
            $nextpay->setAmount(getNumbers()->get('newTotal'));
            $nextpay->token();
            $trans_id = $nextpay->getTransId();
            $request = $nextpay->getRequestURL();
            return view('request', compact('trans_id', 'request'));
        } catch (\Exception $e) {

            echo $e->getMessage();
        }
    }



    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }
}

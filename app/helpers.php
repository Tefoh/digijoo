<?php

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

function presentPrice($price)
{
    return money_format('$%i', $price / 100);
}

function rialPrice($price)
{
    return 'تومان ' . $price;
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

function getStockLevel($quantity)
{
    if ($quantity > config('name.stock_threshold', 5)) {
        $stockLevel = '<div class="badge badge-success">موجود</div>';
    } elseif ($quantity <= config('name.stock_threshold', 5) && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning">موجودی کم</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">ناموجود در انبار</div>';
    }

    return $stockLevel;
}

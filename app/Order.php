<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'gateway', 'status', 'discount', 'discount_code',
        'tax', 'total', 'price', 'trans_id', 'card_number',
        'ip', 'error', 'payment_date', 'id_commodity',
    ];

    protected $table = 'nextpay_gateway_transactions';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}

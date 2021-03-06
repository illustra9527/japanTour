<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['order_id', 'product_id'];

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function area_product()
    {
        return $this->belongsTo('App\ProductContent', 'product_id');
    }
}

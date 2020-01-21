<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductContent extends Model
{
    protected $table = 'product_contents';
    protected $fillable = ['type_id', 'img', 'title', 'text', 'price', 'sort'];

    public function product_type()
    {
        return $this->belongsTo('App\ProductType', 'type_id');
    }

    public function order_items()
    {
        return $this->hasMany('App\OrderItem', 'product_id');
    }
}

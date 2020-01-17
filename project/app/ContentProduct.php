<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentProduct extends Model
{
    protected $table = 'content_products';
    protected $fillable = ['content_id', 'img', 'title', 'text', 'price', 'quantity', 'sort'];

    public function area_content2()
    {
        return $this->belongsTo('App\AreaContent', 'content_id');
    }

    public function order_items2()
    {
        return $this->hasMany('App\OrderItem', 'area_product_id');
    }
}

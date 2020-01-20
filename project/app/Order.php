<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['order_no', 'name', 'id_number', 'phone', 'date', 'email', 'passport_name', 'gender', 'total_price', 'quantity', 'status','remark'];

    public function order_items()
    {
        return $this->hasMany('App\OrderItem', 'order_id');
    }
}

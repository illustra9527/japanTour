<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  ProductType extends Model
{

    protected $table = 'product_types';
    protected $fillable = ['area_id', 'typeName'];

    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id');
    }

    public function product_contents()
    {
        return $this->hasMany('App\ProductContent', 'type_id');
    }
}

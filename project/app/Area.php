<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = ['map_id', 'title', 'text', 'sort', 'img'];

    public function map()
    {
        return $this->belongsTo('App\Map', 'map_id');
    }

    public function product_types()           //產品類別
    {
        return $this->hasMany('App\ProductType', 'area_id');
    }

    public function area_banners()            //地區的詳細Banner
    {
        return $this->hasMany('App\AreaBanner', 'area_id');
    }
}

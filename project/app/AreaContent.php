<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaContent extends Model
{
    protected $table = 'area_contents';
    protected $fillable = ['area_id', 'title', 'text', 'price', 'img'];

    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id');
    }

    public function contentbanners()
    {
        return $this->hasMany('App\ContentBanner', 'content_id')->orderBy('sort', 'desc');
    }

    public function contentproducts()
    {
        return $this->hasMany('App\ContentProduct', 'content_id')->orderBy('sort', 'desc');
    }
}

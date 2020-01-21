<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaBanner extends Model
{

    protected $table = 'area_banner_imgs';
    protected $fillable = ['area_id', 'imgs', 'sort'];

    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id');
    }
}

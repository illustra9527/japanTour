<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table = 'maps';
    protected $fillable = ['title'];

    public function areas()
    {
        return $this->hasMany('App\Area', 'map_id')->orderBy('sort', 'desc');
    }
}

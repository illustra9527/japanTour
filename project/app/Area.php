<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = ['map_id', 'title', 'text', 'sort'];

    public function map()
    {
        return $this->belongsTo('App\Map', 'map_id');
    }

    public function area_contents()
    {
        return $this->hasMany('App\AreaContent', 'area_id');
    }
}

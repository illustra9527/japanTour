<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentBanner extends Model
{
    protected $table = 'content_banner_imgs';
    protected $fillable = ['content_id', 'imgs', 'sort'];

    public function area_content1()
    {
        return $this->belongsTo('App\AreaContent', 'content_id');
    }

}

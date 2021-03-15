<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $table = 'category_image';
    
    public function galleries()
    {
        return $this->belongsToMany('App\Gallery');
    }
}

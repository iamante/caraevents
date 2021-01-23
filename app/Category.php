<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';
    
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}

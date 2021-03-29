<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table = 'venue';
    
    public function locations()
    {
        return $this->belongsTo('App\Location');
    }
}

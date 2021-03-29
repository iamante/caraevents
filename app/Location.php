<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
      'location','venue'
    ];

    protected $table = 'location';
    
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function venues()
    {
        return $this->hasMany('App\Venue', 'location_id');
    }
}

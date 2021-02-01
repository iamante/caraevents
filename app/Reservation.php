<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'email', 'phone', 'address', 'city', 'province', 'postal', 'name', 'details', 'date', 'time', 'price',
    ];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function presentPrice()
    {
        return "₱".number_format($this->price, 2, '.',',');
    }
}

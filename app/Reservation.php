<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'email', 'phone', 'address', 'city', 'province', 'postal', 'name', 'details', 'date', 'start_time', 'end_time', 'price', 'image',
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
        return "₱ ".number_format($this->price, 0, '.',',');
    }

    public function formatCreatedAt() {
        $date = Carbon::parse($this->created_at);

        return $date->isoFormat('MMMM D, YYYY h:mm a');
    }

    public function formatDate()
    {
        $date = Carbon::parse($this->date);

        return $date->isoFormat('MMMM D, YYYY');
    }

    public function formatTime()
    {
        $time = Carbon::parse($this->time);

        return $time->isoFormat('h:mm a');
    }
}

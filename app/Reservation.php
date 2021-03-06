<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use LogsActivity;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName} a reservation";
    }

    protected static $logName = 'Reservations';

    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected $fillable = [
        'user_id',
        'customer_name', 
        'customer_lname', 
        'email', 'phone', 
        'address', 'barangay', 
        'city', 'province', 
        'postal', 'name', 
        'details', 'guests',
        'menu', 'location', 'date', 
        'start_time', 'end_time', 
        'price', 'image',
        'additional_info'
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
        $time = Carbon::parse($this->start_time);

        return $time->isoFormat('h:mm A');
    }

    public function formatEndTime()
    {
        $time = Carbon::parse($this->end_time);

        return $time->isoFormat('h:mm A');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CarRentalReservation extends Model
{
    use LogsActivity;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "The reservation has been {$eventName}";
    }

    protected static $logName = 'Car Rental';

    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;
    
    protected $fillable = [
        'user_id',
        'customer_fname',
        'customer_lname',
        'email',
        'phone',
        'address',
        'barangay',
        'city',
        'province',
        'postal',
        'car_name', 
        'transmission', 
        'color', 'seats', 
        'pickup_location',
        'dropoff_location', 
        'start_date', 
        'start_time', 
        'end_date', 
        'end_time',
        'price', 
    ];
}

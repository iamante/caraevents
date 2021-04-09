<?php

namespace App;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CarRental extends Model
{
    use LogsActivity;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "The rental has been {$eventName}";
    }

    protected static $logName = 'Car Rental';

    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    use Commentable;
    
    public function presentPrice()
    {
        return "₱".number_format($this->price, 0, '.',',');
    }
}

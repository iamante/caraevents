<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Location extends Model
{

    use LogsActivity;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "The location has been {$eventName}";
    }

    protected static $logName = 'Services Location';

    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;


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

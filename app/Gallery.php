<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Gallery extends Model
{
    use LogsActivity;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "The gallery has been {$eventName}";
    }

    protected static $logName = 'Galleries';

    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;
    
    public function categories()
    {
        return $this->belongsToMany('App\CategoryImage');
    }
}

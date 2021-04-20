<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use LogsActivity;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName} a category";
    }

    protected static $logName = 'Category';

    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected $table = 'category';
    
    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
}

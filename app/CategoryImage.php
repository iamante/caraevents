<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CategoryImage extends Model
{
    use LogsActivity;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "The catergory has been {$eventName}";
    }

    protected static $logName = 'Galleries';

    protected static $logAttributes = ['*'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected $table = 'category_image';
    
    public function galleries()
    {
        return $this->belongsToMany('App\Gallery');
    }
}

<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Nicolaslopezj\Searchable\SearchableTrait;


class Service extends Model
{
    use Commentable;
    use SearchableTrait, LogsActivity;

    public function getDescriptionForEvent(string $eventName): string
    {
        
        return "{$eventName} a services";
    }

    protected static $logName = 'Services';

    protected $fillable = ['name', 'slug', 'details', 'guests', 'price', 'description', 'image',];

    protected static $logAttributes = ['name', 'slug', 'details', 'guests', 'price', 'description', 'image'];

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        foreach ($activity->properties['attributes'] as $key => $names ) {
            if ($key === array_key_first($activity->properties['attributes']))
                $name = ucfirst(strtolower($names));
        }

        $activity->description = "{$name} service has been {$eventName}";
    }
    

     /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'services.name' => 10,
            'services.details' => 5,
            'services.description' => 2,
        ],
    ];

    public function presentPrice()
    {
        return "₱".number_format($this->price, 0, '.',',');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location');
    }
}

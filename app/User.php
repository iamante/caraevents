<?php

namespace App;

use Laravelista\Comments\Commenter;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use Notifiable, Commenter, LogsActivity, CausesActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'role_id','email', 'password', 'provider_id',
    ];

    protected static $logAttributes = ['name', 'email', 'remember_token'];

    protected static $logAttributesToIgnore = ['remember_token', 'updated_at'];

    protected static $ignoreChangedAttributes = ['password', 'updated_at', 'remember_token'];

    protected static $recordEvents = ['created', 'updated'];

    protected static $logName = 'user';

    protected static $logOnlyDirty = true;

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->causer_type = "App\User";
        $activity->causer_id = $activity->subject_id;
        $activity->description = "The user has been {$eventName}";
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reserve()
    {
        return $this->hasMany('App\Reservation');
    }

    public function socialProviders(){
        return $this->hasMany(SocialProvider::class);
    }
}

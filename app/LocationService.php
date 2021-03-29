<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationService extends Model
{
    protected $table = 'location_service';

    protected $fillable = ['service_id', 'location_id'];
}

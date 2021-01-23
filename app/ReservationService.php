<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    protected $table = 'reservation_service';

    protected $fillable = [ 'reservation_id', 'service_id' ];
}

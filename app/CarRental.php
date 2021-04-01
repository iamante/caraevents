<?php

namespace App;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;

class CarRental extends Model
{

    use Commentable;
    
    public function presentPrice()
    {
        return "₱".number_format($this->price, 0, '.',',');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    protected $table = 'category_service';

    protected $fillable = ['service_id', 'category_id'];
}

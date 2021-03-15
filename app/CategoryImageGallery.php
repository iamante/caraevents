<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImageGallery extends Model
{
    protected $table = 'category_image_gallery';
    
    protected $fillable = ['gallery_id', 'category_image_id'];
}
<?php

namespace App;

use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Service extends Model
{
    use Commentable;
    use SearchableTrait;

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
}

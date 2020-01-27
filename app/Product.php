<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guard = [];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}

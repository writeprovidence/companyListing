<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     public function company()
    {
        return $this->belongsTo('App\Models\Review');
    }
}

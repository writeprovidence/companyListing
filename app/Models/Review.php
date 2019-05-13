<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'likes', 'dislikes', 'company_id'
    ];
     public function company()
    {
        return $this->belongsTo('App\Models\Review');
    }
}

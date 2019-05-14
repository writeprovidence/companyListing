<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'likes', 'dislikes', 'company_id', 'logged_user_id','full_name',
        'title', 'review_ip', 'verification_ip', 'verification_time',
        'is_verified', 'review',
    ];

     public function company()
    {
        return $this->belongsTo('App\Models\Review');
    }
}

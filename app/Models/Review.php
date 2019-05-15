<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'likes', 'dislikes', 'company_id', 'logged_user_id','full_name',
        'title', 'review_ip', 'verification_ip', 'verification_time',
        'is_verified', 'review', 'slug', 'response', 'response_user_id',
        'response_timestamp', 'response_ip', 'reliability', 'pricing',
        'user_friendly', 'support','features', 'services', 'score'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
      public function isVerified()
    {
        return $this->is_verified ? true : false;
    }

    // public function hasResponse()
    // {
    //     return $this->response  != 'No response yet!' ? true : false;
    // }

    public function getResponseAttribute($value)
    {
        return $value ?? $this->defaultReponse();
    }

    public function defaultReponse()
    {
        return 'No response yet!';
    }
}

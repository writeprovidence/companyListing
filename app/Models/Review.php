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
        'user_friendly', 'support','features', 'services', 'score',
        'feature', 'is_public', 'site', 'service','social_profile',
        'email', 'previous_hosting',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function isVerified()
    {
        return $this->is_verified ? true : false;
    }

    public function isFeatured()
    {
        return $this->feature ? true : false;
    }

    public function isApproved()
    {
        return $this->is_public ? true : false;
    }


}

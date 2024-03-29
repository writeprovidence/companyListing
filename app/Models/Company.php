<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable =[
        'user_id', 'name', 'email', 'phone','website',
        'link_to_go', 'country', 'zip', 'description',
        'is_public', 'address_line1', 'address_line2',
        'state', 'city', 'slug', 'clicks_sent', 'page_views',
        'alexa_global_rank', 'alexa_top_country_id',
        'alexa_country_rank', 'rating','feature', 'linkedin',
        'twitter', 'facebook', 'avatar', 'tag_line'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function domains()
    {
        return $this->hasMany('App\Models\Domain');
    }

    public function companyApproved()
    {
        return $this->is_public ? true : false;
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function getApprovedReviewsCountAttribute()
    {
        $reviewCount = $this->reviews()->whereIsVerified(1)->whereIsPublic(1)->count();
        return $reviewCount;
    }

    public function setRatingAttribute()
    {
        $reviewScores = \App\Models\Review::whereCompanyId($this->id)->pluck('score')->all();
        if(count($reviewScores) != 0){
            $this->attributes['rating']  = floor(array_sum($reviewScores) / count($reviewScores));
            return array_sum($reviewScores) / count($reviewScores);
        }
        $this->attributes['rating'] =  0;
    }

    public function recalculateRating()
    {
        $reviewScores = \App\Models\Review::whereCompanyId($this->id)->pluck('score')->all();
        if(! count($reviewScores)){
            $this->attributes['rating'] =  0;
        }

        return floor(array_sum($reviewScores) / count($reviewScores));
    }

    public function getReliabilityAttribute()
    {
        $reliabilityScores = \App\Models\Review::whereCompanyId($this->id)->pluck('reliability')->all();
        if(! count($reliabilityScores)){
            return 0;
        }
        return floor(array_sum($reliabilityScores) / count($reliabilityScores));
    }

    public function getPricingAttribute()
    {
        $pricingScores = \App\Models\Review::whereCompanyId($this->id)->pluck('pricing')->all();
        if(! count($pricingScores)){
            return 0;
        }
        return floor(array_sum($pricingScores) / count($pricingScores));
    }

    public function getPercentageRatingAttribute()
    {
       return $this->rating * 10;
    }


    public function getUserFriendlyAttribute()
    {
        $userFriendlyScores = \App\Models\Review::whereCompanyId($this->id)->pluck('user_friendly')->all();
        if(! count($userFriendlyScores)){
            return 0;
        }
        return floor(array_sum($userFriendlyScores) / count($userFriendlyScores));
    }

    public function getSupportAttribute()
    {
        $supportScores = \App\Models\Review::whereCompanyId($this->id)->pluck('support')->all();
        if(! count($supportScores)){
            return 0;
        }
        return floor(array_sum($supportScores) / count($supportScores));
    }

    public function getFeaturesAttribute()
    {
        $featureScores = \App\Models\Review::whereCompanyId($this->id)->pluck('features')->all();
        if(! count($featureScores)){
            return 0;
        }
        return floor(array_sum($featureScores) / count($featureScores));
    }

    public function isFeatured()
    {
        return $this->feature == 1 ? true : false;
    }

    public function products()
    {
        return $this->hasOne('App\Models\Product');
    }

    public function hasProduct()
    {
        if($this->products){
            return $this->products->updated_at->ne($this->products->created_at) ? true : false;
        }
        return false;
    }
}


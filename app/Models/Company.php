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
        'alexa_country_rank', 'score'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function companyApproved()
    {
        return $this->is_public ? true : false;
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function getRatingAttribute(){
        $reviewScores = \App\Models\Review::whereCompanyId($this->id)->pluck('score')->all();
        if(! count($reviewScores)){
            return 0;
        }
        return floor(array_sum($reviewScores) / count($reviewScores));
    }
}

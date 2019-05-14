<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AlexaLog extends Model
{
    protected $fillable = [
        'company_id', 'alexa_global_rank', 
        'alexa_top_country_id', 'alexa_country_rank'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}

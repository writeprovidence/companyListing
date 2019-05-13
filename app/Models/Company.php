<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable =[
        'user_id', 'name', 'email', 'phone','website',
        'link_to_go', 'country','description','is_public'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

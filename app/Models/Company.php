<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable =[
        'user_id', 'name', 'email', 'phone','website',
        'link_to_go', 'country', 'zip', 'description',
        'is_public', 'address_line1', 'address_line2',
        'state', 'city'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

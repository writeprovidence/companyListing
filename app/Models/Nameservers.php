<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Nameservers extends Model
{
    protected $fillable =[
        'name_1', 'name_2', 'company_id'
    ];
}

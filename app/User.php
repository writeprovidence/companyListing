<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','registeration_ip', 'verification_ip','is_verified', 'title', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->hasOne('App\Models\Company')->withDefault([
            'name' => 'No Company Yet',
            'slug' => 'No-Company-Yet',
            // 'website' => '#',
            'country' => 'Not Available',
            'alexa_global_rank' => 'nil',
            'rating' => 'nil'
        ]);
    }


    public function hasCompany()
    {
        return $this->company->name != "No Company Yet" ? true : false;
    }

    public function isVerified()
    {
        return $this->is_verified ? true : false;
    }

    public function isAdmin()
    {
        return $this->role == 'admin' ? true : false;
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'logged_user_id');
    }
}

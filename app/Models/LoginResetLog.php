<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginResetLog extends Model
{
    protected $fillable = [
        'user_id', 'email_link', 'requestor_ip', 'request_timestamp', 'link_clicked', 'confirmation_timestamp '
    ];

    protected $dates = [
        'confirmation_timestamp'
    ];

}

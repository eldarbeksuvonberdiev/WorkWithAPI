<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckMail extends Model
{
    protected $fillable = [
        'user_id',
        'password'
    ];
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'owner_name',
        'owner_bio',
        'owner_phone',
        'owner_address',
        'owner_photo',
        'whatsapp',
        'facebook',
        'instagram',
        'tiktok',
        'youtube',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class DeviceAccess extends Model
{
    protected $fillable = [
        'user_id',
        'device_id',
    ];
}
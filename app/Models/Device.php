<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

class Device extends Model
{
    protected $fillable = [
        'name',
        'model',
        'device_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'device_accesses','user_id','device_id');
    }
}
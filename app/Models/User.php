<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'blood_type_id',
        'gender',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function request()
    {
        return $this->hasMany(Request::class);
    }

    public function userEvent()
    {
        return $this->hasMany(UserEvent::class);
    }



}


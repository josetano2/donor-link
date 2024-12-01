<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'hospital_id',
        'description',
        'max_capacity',
        'time_start',
        'time_end',
        'contact_number',
        'contact_person',
        'date',
        'image_url',
    ];

    public function userEvents()
    {
        return $this->hasMany(UserEvent::class, 'event_id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'user_events')
    //         ->withTimestamps();
    // }
}

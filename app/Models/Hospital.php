<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}

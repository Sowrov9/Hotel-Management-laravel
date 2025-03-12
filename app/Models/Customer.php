<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    function bookings(){
        return $this->hasMany(Booking::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    function customer(){
        return $this->belongsTo(Customer::class);
    }
    function room(){
        return $this->belongsTo(Room::class);
    }
    function roomType(){
        return $this->belongsTo(RoomType::class);
    }
    // function roomType(){
    //     return $this->hasOneThrough(RoomType::class, Room::class, 'id', 'id', 'room_id', 'room_type_id');
    // }
}

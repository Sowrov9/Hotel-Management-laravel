<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    function roomType(){
        return $this->belongsTo(RoomType::class,'roomtype_id');
    }
}

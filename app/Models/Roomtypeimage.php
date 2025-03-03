<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtypeimage extends Model
{
    public function roomtype(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
}

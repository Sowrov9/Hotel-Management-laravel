<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    function roomtypeimages(){
        return $this->hasMany(Roomtypeimage::class,'room_type_id');
    }
}
 
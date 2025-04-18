<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $roomtypes= RoomType::all();
        return view("pages.home",compact('roomtypes'));
    }
}

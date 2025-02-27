<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms= Room::all();
        return view("pages.erp.room.index",compact("rooms"));
        // print_r($rooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomtypes= RoomType::all();
        return view("pages.erp.room.create", compact("roomtypes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
        ]);
        $room=new Room();
        $room->title=$request->title;
        $room->room_type_id	=$request->room_type_id;

        $room->save();
        if($room){
            return redirect("admin/room")->with("success","Room Successfully created");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $room= Room::find($id);
        return view("pages.erp.room.show",compact("room"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomtypes= RoomType::all();
        $room=Room::find($id);
        return view("pages.erp.room.update",compact("room","roomtypes"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
        ]);
        $room=Room::find($id);
        $room->title=$request->title;
        $room->room_type_id=$request->room_type_id;
        $room->save();
        if($room){
            return redirect("admin/room")->with("success","Room Successfully updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room=Room::find($id);
        $room->delete();
        return redirect("admin/room")->with("success","Room Successfully deleted");
    }
}

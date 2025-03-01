<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomtypes=RoomType::all();
        return view("pages.erp.roomtype.index",compact('roomtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.erp.roomtype.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'imgs' => 'sometimes|array', // Allow imgs to be missing instead of nullable
            'imgs.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each file individually
        ]);

        $roomtype=new RoomType();
        $roomtype->title=$request->title;
        $roomtype->price=$request->price;
        $roomtype->details=$request->details;
        $roomtype->save();

        if ($request->hasFile('imgs')) {
            foreach (array_values($request->file('imgs')) as $img) { // Force array indexing
                $imgpath = $img->store('public/assets/images');
                $imgdata = new Roomtypeimage();
                $imgdata->room_type_id = $roomtype->id;
                $imgdata->img_src = $imgpath;
                $imgdata->img_alt = $roomtype->title;
                $imgdata->save();
            }
        }




            return redirect("admin/roomtype")->with("success","Roomtype successfully created");


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $roomtype=RoomType::find($id);
        return view("pages.erp.roomtype.show",compact('roomtype'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roomtype= RoomType::find($id);
        return view("pages.erp.roomtype.update",compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
        ]);
        $roomtype= RoomType::find($id);
        $roomtype->title=$request->title;
        $roomtype->price=$request->price;
        $roomtype->details=$request->details;
        $roomtype=$roomtype->save();
        if($roomtype){
            return redirect("admin/roomtype")->with("success","Data successfully updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Find the room type by ID
    $roomtype = RoomType::find($id);

    // Check if the record exists
    if (!$roomtype) {
        return redirect()->back()->with('error', 'Room type not found.');
    }

    // Delete the record
    $roomtype->delete();

    // Redirect with success message
    return redirect("admin/roomtype")->with('success', 'Room type deleted successfully.');
}

}

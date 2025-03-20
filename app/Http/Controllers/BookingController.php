<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings=Booking::all();
        return view("pages.erp.booking.index",compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers=Customer::all();
        $roomtypes=RoomType::all();
        return view("pages.erp.booking.create",compact('customers','roomtypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'required',
            'room_type_id'=>'required',
            'room_id'=>'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'total_adult'=>'required',
        ]);
        $booking=new Booking();
        $booking->customer_id=$request->customer_id;
        $booking->room_type_id=$request->room_type_id;
        $booking->room_id=$request->room_id;
        $booking->checkin_date=$request->checkin_date;
        $booking->checkout_date=$request->checkout_date;
        $booking->total_adult=$request->total_adult;
        $booking->total_children=$request->total_children;

        $booking->save();
        if($booking){
            return redirect("admin/booking")->with("success","Room Successfully created");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking=Booking::find($id);
        return view("pages.erp.booking.show",compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking= Booking::find($id);
        $customers= Customer::all();
        $roomtypes=RoomType::all();
        return view("pages.erp.booking.update",compact('booking','customers','roomtypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // public function available_rooms(Request $request, $checkin_date){
    //     $arooms=DB::select("select * from rooms where id not in(select room_id from bookings where '$checkin_date' between checkin_date and checkout_date)");
    //     return response()->json(['data'=>$arooms]);
    // }

    public function available_rooms(Request $request) {
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;
        $room_type_id = $request->room_type_id;

        $arooms = DB::select("
            SELECT * FROM rooms
            WHERE room_type_id = ?
            AND id NOT IN (
                SELECT room_id FROM bookings
                WHERE ? BETWEEN checkin_date AND checkout_date
                OR ? BETWEEN checkin_date AND checkout_date
            )", [$room_type_id, $checkin_date, $checkout_date]);

        return response()->json(['data' => $arooms]);
    }

}

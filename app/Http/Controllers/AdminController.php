<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    //Login
    function login(){
        return view("pages.login");
    }
    public function login_check(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(["username"=>$request->username,"password"=>($request->password)])->count();
        if($admin>0){
            $adminData=Admin::where(["username"=>$request->username, "password"=>($request->password)])->get();
            session(["adminData"=>$adminData]);
            if ($request->has('rememberMe')) {
                Cookie::queue('adminUser',$request->username,1440);
                Cookie::queue('adminPassword',$request->password,1440);
            }
            return redirect("/admin");
        }
        else{
            return redirect("admin/login")->with("msg","Invalid Username or Password");
        }
    }

    //Logout
    public function logout(){
        session()->forget(["adminData"]);
        return redirect("admin/login");
    }

    //dashboard
    public function dashboard(){
        $bookings=Booking::selectRaw('count(id) as total_checkin,checkin_date')->groupBy('checkin_date')->get();
        $bookings=Booking::selectRaw('count(id) as total_checkout,checkout_date')->groupBy('checkout_date')->get();
        $checkin=[];
        $checkout=[];
        foreach ($bookings as $booking) {
            $checkin=$booking['total_checkin'];
            $checkout=$booking['total_checkout'];
        }
        return view("pages.dashboard",compact('checkin','checkout'));
    }
}

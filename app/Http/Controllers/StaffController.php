<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs= Staff::all();
        return view("pages.erp.staff.index",compact("staffs"));
        // print_r($staffs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments= Department::all();
        return view("pages.erp.staff.create", compact("departments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'department_id'=>'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'bio'=>'required',
            'salary_type'=>'required',
            'salary_amount'=>'required',
        ]);
        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $staffname=str_replace(' ','_',$request->name);
            $extension=$file->getClientOriginalExtension();
            $photoname=$staffname.'_'. time() .'_'. uniqid() .'.'. $extension;
            $file->move(public_path('storage/images'),$photoname);
        } else {
            $photoname=null;
        }

        $staff=new Staff();
        $staff->name=$request->name;
        $staff->department_id=$request->department_id;
        $staff->photo=$photoname;
        $staff->bio=$request->bio;
        $staff->salary_type=$request->salary_type;
        $staff->salary_amount=$request->salary_amount;
        $staff->save();
        if($staff->save()){
            return redirect("admin/staff")->with("success","staff Successfully created");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $staff= Staff::find($id);
        return view("pages.erp.staff.show",compact("staff"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments= Department::all();
        $staff=Staff::find($id);
        return view("pages.erp.staff.update",compact("staff","departments"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name'=>'required|min:3',
            'department_id'=>'required',
            // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'photo' => 'image|mimes:jpeg,png,jpg,gif',
            'bio'=>'required',
            'salary_type'=>'required',
            'salary_amount'=>'required',
        ]);
        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $staffname=str_replace(' ','_',$request->name);
            $extension=$file->getClientOriginalExtension();
            $photoname=$staffname.'_'. time() .'_'. uniqid() .'.'. $extension;
            $file->move(public_path('storage/images'),$photoname);
        } else {
           $photoname=$request->prev_photo;
        }

        $staff=Staff::find($id);
        $staff->name=$request->name;
        $staff->department_id=$request->department_id;
        $staff->photo=$photoname;
        $staff->bio=$request->bio;
        $staff->salary_type=$request->salary_type;
        $staff->salary_amount=$request->salary_amount;
        $staff->save();
        if($staff->save()){
            return redirect("admin/staff")->with("success","staff Successfully updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff=Staff::find($id);
        $staff->delete();
        return redirect("admin/staff")->with("success","staff Successfully deleted");
    }

    // Staff Payment
    public function all_payment($staff_id){
        $payments=StaffPayment::where("staff_id",$staff_id)->get();
        $staff=Staff::find($staff_id);
        return view("pages.erp.staffpayment.index",compact('payments','staff','staff_id'));
    }
    public function add_payment($staff_id){
        $staff=Staff::find($staff_id);
        return view("pages.erp.staffpayment.create",compact('staff_id','staff'));
    }
    public function save_payment(Request $request, $staff_id){
        $request->validate([
            'amount'=>'required',
            'payment_date'=>'required',
        ]);
        $staff_payment=new StaffPayment();
        $staff_payment->staff_id=$staff_id;
        $staff_payment->amount=$request->amount;
        $staff_payment->payment_date=$request->payment_date;
        $staff_payment->save();
        if($staff_payment->save()){
            return redirect("admin/staff/payment/".$staff_id)->with("success","staff Successfully created");
        }
    }
    public function delete_payment($id,$staff_id)
    {
        // $staff_payment=Staff::find($id);
        // $staff_payment->delete();
        StaffPayment::where('id',$id)->delete();
        return redirect("admin/staff/payment/".$staff_id)->with("success","staff Successfully deleted");
    }
}

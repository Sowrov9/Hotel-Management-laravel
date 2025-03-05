<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
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
            'title'=>'required',
        ]);
        $staff=staff::find($id);
        $staff->title=$request->title;
        $staff->staff_type_id=$request->staff_type_id;
        $staff->save();
        if($staff){
            return redirect("admin/staff")->with("success","staff Successfully updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff=staff::find($id);
        $staff->delete();
        return redirect("admin/staff")->with("success","staff Successfully deleted");
    }
}

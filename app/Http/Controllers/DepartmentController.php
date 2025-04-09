<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments= Department::all();
        return view("pages.erp.department.index",compact("departments"));
        // print_r($departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.erp.department.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
        ]);
        $department=new Department();
        $department->title=$request->title;
        $department->details=$request->details;

        $department->save();
        if($department){
            return redirect("admin/department")->with("success","department Successfully created");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $department= Department::find($id);
        return view("pages.erp.department.show",compact("department"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department=Department::find($id);
        return view("pages.erp.department.update",compact("department"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'title'=>'required',
        // ]);
        $department=Department::find($id);
        $department->title=$request->title;
        $department->details=$request->details;
        $department->save();
        if($department){
            return redirect("admin/department")->with("success","department Successfully updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department=Department::find($id);
        $department->delete();
        return redirect("admin/department")->with("success","department Successfully deleted");
    }
}

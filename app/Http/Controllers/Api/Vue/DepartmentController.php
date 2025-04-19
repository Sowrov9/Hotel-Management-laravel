<?php

namespace App\Http\Controllers\Api\Vue;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department= Department:: all();
        return response()->json($department);
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
            return response()->json($department);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department= Department::find($id);
        return response()->json($department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
        ]);
        $department=Department::find($id);
        $department->title=$request->title;
        $department->details=$request->details;
        $department->save();
        return response()->json( $department);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department=Department::find($id);
        $department->delete();
        return response()->json($department);
    }
}

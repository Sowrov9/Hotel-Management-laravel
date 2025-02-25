<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::all();
        return view("pages.erp.customer.index",compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.erp.customer.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:customers,email',
            'password'=>'required|min:6',
            'mobile' => 'required|numeric|min:11',
            'address' => 'required|string|min:5|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $photoName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $photoName);
        }else{
            $photoName=Null;
        }

        $customer=new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=sha1($request->password);
        $customer->mobile=$request->mobile;
        $customer->address=$request->address;
        $customer->photo=$photoName;
        $customer=$customer->save();
        if($customer){
            return redirect("admin/customer")->with("success","customer successfully created");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer=Customer::find($id);
        return view("pages.erp.customer.show",compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer= Customer::find($id);
        return view("pages.erp.customer.update",compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email',
            // 'password'=>'required|min:6',
            'mobile' => 'required|numeric|min:11',
            // 'address' => 'required|string|min:5|max:255',
            // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $photoName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $photoName);
        }else{
            $photoName=Null;
        }
        $customer= Customer::find($id);
        // $imgpath=$request->file('photo')->store('public/assets/images');
        $customer->name=$request->name;
        $customer->email=$request->email;
        // $customer->password=sha1($request->password);
        $customer->mobile=$request->mobile;
        $customer->address=$request->address;
        $customer->photo=$photoName;
        $customer=$customer->save();
        if($customer){
            return redirect("admin/customer")->with("success","Data successfully updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Find the room type by ID
    $customer = Customer::find($id);

    // Check if the record exists
    if (!$customer) {
        return redirect()->back()->with('error', 'Room type not found.');
    }

    // Delete the record
    $customer->delete();

    // Redirect with success message
    return redirect("admin/customer")->with('success', 'Room type deleted successfully.');
}
}

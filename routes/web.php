<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//login/logout route
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'login_check']);
Route::get('admin/logout',[AdminController::class,'logout']);

Route::get('/admin', function () {
    return view('pages.dashboard');
});//->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// roomtype route
Route::get("admin/roomtype/{id}/delete",[RoomtypeController::class,'destroy']);
Route::resource("admin/roomtype",RoomtypeController::class);

// room route
Route::get("admin/room/{id}/delete",[RoomController::class,'destroy']);
Route::resource("admin/room",RoomController::class);

// customer route
Route::get("admin/customer/{id}/delete",[CustomerController::class,'destroy']);
Route::resource("admin/customer",CustomerController::class);

//roomtype image delete
Route::get("admin/roomtypeimage/delete/{id}",[RoomtypeController::class,'destroy_img']);

// department route
Route::get("admin/department/{id}/delete",[DepartmentController::class,'destroy']);
Route::resource("admin/department",DepartmentController::class);

// Staff route
Route::get("admin/staff/{id}/delete",[StaffController::class,'destroy']);
Route::resource("admin/staff",StaffController::class);
// Staff Payment route
Route::get("admin/staff/payment/{id}",[StaffController::class,'all_payment']);
Route::get("admin/staff/payment/{id}/add",[StaffController::class,'add_payment']);
Route::post("admin/staff/payment/{id}",[StaffController::class,'save_payment']);
Route::get("admin/staff/payment/{id}/{staff_id}/delete",[StaffController::class,'delete_payment']);

require __DIR__.'/auth.php';

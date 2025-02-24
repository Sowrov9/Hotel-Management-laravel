<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
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
// Route::get("admin/room/{id}/delete",[RoomtypeController::class,'destroy']);
Route::resource("admin/room",RoomController::class);

require __DIR__.'/auth.php';

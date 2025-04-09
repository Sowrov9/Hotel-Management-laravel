
<?php

use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\Vue\CustomerController;
use App\Http\Controllers\Api\Vue\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/rooms', [RoomController::class, 'index']);
Route::apiResource('customer',CustomerController::class);
Route::apiResource('department',DepartmentController::class);



?>


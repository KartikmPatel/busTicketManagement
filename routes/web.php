<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/adminHome',[adminController::class,'adminHome']);

route::get('manageBus',[adminController::class,'viewBuses']);
route::post('addBus',[adminController::class,'addBus']);
route::get('deleteBus/{id}',[adminController::class,'deleteBus']);
// route::get('editBus/{id}',[adminController::class,'editBus']);
route::post('updateBus/{id}',[adminController::class,'updateBus']);

route::get('manageRoute',[adminController::class,'viewRoutes']);
route::post('addRoute',[adminController::class,'addRoute']);
route::get('deleteRoute/{id}',[adminController::class,'deleteRoute']);
route::post('updateRoute',[adminController::class,'updateRoute']);

route::get('manageStaff',[adminController::class,'viewStaff']);
route::post('addStaff',[adminController::class,'addStaff']);
route::get('deleteStaff/{id}',[adminController::class,'deleteStaff']);
route::post('updateStaff',[adminController::class,'updateStaff']);
// route::post('busEdit/action',[adminController::class,'busAction']);

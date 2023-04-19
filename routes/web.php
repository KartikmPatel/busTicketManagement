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

route::post('manageBus',[adminController::class,'addBus']);
route::get('deleteBus/{id}',[adminController::class,'deleteBus']);
// route::get('editBus/{id}',[adminController::class,'editBus']);
// route::post('updateBus/{id}',[adminController::class,'updateBus']);

// route::post('busEdit/action',[adminController::class,'busAction']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin Side //
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

route::get('manageStation',[adminController::class,'viewStations']);
route::post('addStation',[adminController::class,'addStation']);
route::get('deleteStation/{id}',[adminController::class,'deleteStation']);
// route::get('editBus/{id}',[adminController::class,'editBus']);
route::post('updateStation/{id}',[adminController::class,'updateStation']);
route::get('manageBooking',[adminController::class,'manageBooking']);
route::get('manageCancelTicket',[adminController::class,'manageCancelTicket']);

route::get('adminSeats',[adminController::class,'adminSeats']);
route::post('searchSeats',[adminController::class,'searchSeats']);

route::get('test',function(){
    return view('Admin.testAdmin');
});


// User Side //
// route::get('/{locale}',[userController::class,'home']);
route::get('/',[userController::class,'home']);

route::post('signUp',[userController::class,'signUp']);
route::post('login',[userController::class,'login']);
route::get('logout',[userController::class,'logout']);

route::post('searchBus',[userController::class,'searchBus']);
route::post('viewSeat',[userController::class,'viewSeat']);

route::middleware(['guard'])->group(function(){
    route::post('booking',[userController::class,'booking']);
    route::post('/downloadTicket',[userController::class,'downloadTicket']);
});

route::post('showTicket',[userController::class,'showTicket']);

route::get('viewProfile',[userController::class,'viewProfile']);
route::post('editProfile',[userController::class,'editProfile']);
route::post('editImage',[userController::class,'editImage']);
route::get('changePassword',[userController::class,'changePassword']);
route::post('passwordChange',[userController::class,'passwordChange']);

route::get('viewHistory',[userController::class,'viewHistory']);
route::get('cancelTicket',[userController::class,'cancelTicket']);
route::post('ticketCancel',[userController::class,'ticketCancel']);
route::post('ticketCancel2',[userController::class,'ticketCancel2']);

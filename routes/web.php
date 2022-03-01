<?php

use Web\DriverController;
use Web\FatherController;
use Web\ChildController;
use Web\VehicleController;
use Web\BusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});


 // Route For Auth 
Auth::routes(['verify'=>true]);


// Route For home 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


// Route For father 
Route::resource('father',FatherController::class)->middleware('verified');


// Route For child 
Route::resource('child',ChildController::class)->middleware('verified');


// Route For driver 
Route::resource('driver',DriverController::class)->middleware('verified');


// Route For vehicle 
Route::resource('vehicle',VehicleController::class)->middleware('verified');


// Route For Bus 
Route::resource('bus',BusController::class)->middleware('verified');
// Route::get("bus.index","Web\BusController@index")->middleware('verified');
// Route::get("bus.show","Web\BusController@show")->middleware('verified');
// Route::put("bus.update","Web\BusController@update")->middleware('verified');
// Route::delete("bus.delete","Web\BusController@Destroy")->middleware('verified');





// Last Route For error
Route::fallback(function(){
    return view("404/404");
});
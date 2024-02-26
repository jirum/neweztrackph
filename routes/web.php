<?php

use App\Http\Controllers\VehiclesController;
use Illuminate\Support\Facades\Route;

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

// Route::controller(StudentController::class)->group(function (){
//     Route::get('/', 'index')->middleware('auth');
//     Route::get('/add/student', 'create');
//     Route::post('/add/student', 'store');
//     Route::get('student/{id}', 'show');
//     Route::put('student/{student}', 'update');
//     Route::delete('student/{student}', 'destroy')->name('delete');
       
// });

// Route::get('posts', [PostController::class, 'index'])->middleware('auth');
// Route::get('/add/post', [PostController::class, 'new']);
// Route::post('/add/post', [PostController::class, 'create']);
// Route::get('edit-post/{id}', [PostController::class, 'show']);
// Route::put('edit-post/{post}', [PostController::class, 'update']);

Route::get('/', [VehiclesController::class, 'index']);
Route::get('/getdata', [VehiclesController::class, 'getData'])->name('vehicles');
Route::get('/getdatainterval', [VehiclesController::class, 'getDataInterval'])->name('dataInterval');
Route::get('/getgeofences', [VehiclesController::class, 'getGeofenceData'])->name('geofence');
Route::get('/getimeidata', [VehiclesController::class, 'getImeiData'])->name('imeidata');
Route::get('/showRoute/{imei}/{startDate}/{endDate}', [VehiclesController::class, 'showRoute'])->name('showRoute');

Route::get('test', [VehiclesController::class, 'test']);
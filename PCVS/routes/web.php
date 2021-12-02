<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterHAController;
use App\Http\Controllers\RegisterPAController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\AppointmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});
Route::get('/welcome', function () {
    return view('welcome', [
        "title" => "Home"
    ]);
});

Auth::routes(['verify' => true]);

//login 
Route::get('/login', [LoginController::class, 'index'])->name('login');;
Route::post('/login',[LoginController::class, 'auth'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
//register 


 
Route::get('/registerPA', [RegisterPAController::class, 'index']);
Route::post('/registerPA', [RegisterPAController::class, 'store']);


// Route::middleware(['auth','checkRole:master'])->group(function()
// {
//     Route::get('/registerHA', [RegisterHAController::class, 'index']);
//     Route::post('/registerHA', [RegisterHAController::class, 'store']);
//     Route::post('/addCentre', [RegisterHAController::class, 'addCentre']);
//     Route::get('/dashboard',[DashboardController::class, 'index_admin']);
//     Route::get('/batch',[BatchController::class, 'index']);
//     Route::post('/addBatch', [BatchController::class, 'addBatch']);
//     Route::get('/vaccinationAppoint/{id}/appointment',[AppointmentController::class, 'appointment']);
//     // Route::get('/confirm/{id}/confirm',[AppointmentController::class, 'confirm']);
//     Route::post('/confirm',[AppointmentController::class, 'confirm']);
//     Route::post('/reject',[AppointmentController::class, 'reject']);

// });
Route::middleware(['auth','checkRole:admin,master'])->group(function()
{
    Route::get('/registerHA', [RegisterHAController::class, 'index'])->middleware('role:master');;
    Route::post('/registerHA', [RegisterHAController::class, 'store'])->middleware('role:master');;
    Route::post('/addCentre', [RegisterHAController::class, 'addCentre'])->middleware('role:master');;

    Route::get('/dashboard',[DashboardController::class, 'index_admin']);
    Route::get('/batch',[BatchController::class, 'index']);
    Route::post('/addBatch', [BatchController::class, 'addBatch']);
    Route::get('/vaccinationAppoint/{id}/appointment',[AppointmentController::class, 'appointment']);
    // Route::get('/confirm/{id}/confirm',[AppointmentController::class, 'confirm']);
    Route::post('/confirm',[AppointmentController::class, 'confirm']);
    Route::post('/reject',[AppointmentController::class, 'reject']);

});

Route::middleware(['auth','checkRole:patient'])->group(function()
{
    Route::get('/dashboard_p',[DashboardController::class, 'index_patient']);
    Route::get('/vaccination',[VaccinationController::class, 'index']);
    Route::post('/appointment', [VaccinationController::class, 'appointment']);
});





// Route::post('/postlogin','AuthController@postlogin');

// //register
// Route::get('/Register','AuthController@Register')->name('Register');
// Route::post('/postRegister','AuthController@postRegister');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

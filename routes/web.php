<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

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


Route::get('/', [Controllers\HomeController::class, 'index']);

// Route::get('/home', [Controllers\HomeController::class, 'redirect']);
Route::get('/home', [Controllers\HomeController::class, 'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function() {
 Route::get('/approve/{id}',[Controllers\AppointmentController::class,'approve'])->name('approve');

 Route::get('/myappoints',[Controllers\AppointmentController::class,'myAppointments'])->name('myappointments');

 Route::get('/cancel_appoint/{id}', [Controllers\AppointmentController::class, 'cancelAppoint'])->name('cancel-apt');

 Route::get('/appointments',[Controllers\AppointmentController::class,'appoints'])->name('view-apts');

 Route::resource('/doctor', Controllers\DoctorController::class);

 Route::get('/{id}/mailform', [Controllers\AdminController::class, 'mailForm'])->name('mailform');

 Route::post('/sendmail', [Controllers\AdminController::class, 'sendMail'])->name('sendmail');
});

Route::post('/',[Controllers\AppointmentController::class,'makeAppointment'])->name('appointment');


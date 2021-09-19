<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AttendanceController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/list/doctors', [DoctorController::class, 'show'])->middleware(['auth'])->name('list_doctors');

Route::get('/list/patients', [PatientController::class, 'show'])->middleware(['auth'])->name('list_patients');

Route::get('/create/doctor', [DoctorController::class, 'create'])->middleware(['auth'])->name('create_doctor');

Route::get('/create/patient', [PatientController::class, 'create'])->middleware(['auth'])->name('create_patient');

Route::get('/create/attendance', [AttendanceController::class, 'create'])->middleware(['auth'])->name('create_attendance');

require __DIR__.'/auth.php';

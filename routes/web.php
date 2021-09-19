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

Route::get('/create/doctor', [DoctorController::class, 'create'])->middleware(['auth'])->name('create_doctor');

Route::post('/store/doctor', [DoctorController::class, 'store'])->middleware(['auth'])->name('store_doctor');

Route::get('/delete/doctor/{doctor}', [DoctorController::class, 'destroy'])->middleware('auth')->name('delete_doctor');

Route::post('/update/doctor/{doctor}', [DoctorController::class, 'update'])->middleware('auth')->name('update_doctor');

Route::get('/list/patients', [PatientController::class, 'show'])->middleware(['auth'])->name('list_patients');

Route::get('/create/patient', [PatientController::class, 'create'])->middleware(['auth'])->name('create_patient');

Route::post('/store/patient', [PatientController::class, 'store'])->middleware(['auth'])->name('store_patient');

Route::get('/delete/patient/{patient}', [PatientController::class, 'destroy'])->middleware('auth')->name('delete_patient');

Route::post('/update/patient/{patient}', [PatientController::class, 'update'])->middleware('auth')->name('update_patient');

Route::get('/create/attendance', [AttendanceController::class, 'create'])->middleware(['auth'])->name('create_attendance');

Route::post('/store/attendance', [AttendanceController::class, 'store'])->middleware(['auth'])->name('store_attendance');

Route::get('/delete/attendance/{attendance}', [AttendanceController::class, 'destroy'])->middleware('auth')->name('delete_attendance');

Route::post('/update/attendance/{attendance}', [AttendanceController::class, 'update'])->middleware('auth')->name('update_attendance');

require __DIR__.'/auth.php';
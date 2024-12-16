<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VaccineCenterController;
use App\Models\User;
use App\Models\VaccineCenter;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('users.register');
});



Route::get('/register', [AuthController::class, 'register'])->name('users.register');
Route::post('/register', [AuthController::class, 'store'])->name('users.store');

Route::get('/users', function ()  {
    $users = User::get();
    return view('users.index', compact('users'));
})->name('users.index');

Route::get('/users/not-scheduled', function ()  {
    $users = User::where('status', '=', 'Not_Scheduled')->get();
    return view('users.not-scheduled', compact('users'));
})->name('users.not-scheduled');

Route::get('vaccine_centers', [VaccineCenterController::class, 'index'])->name('vaccine_centers.index');
Route::get('vaccine_centers/{id}', [VaccineCenterController::class, 'show'])->name('vaccine_centers.show');



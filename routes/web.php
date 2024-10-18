<?php

use App\Http\Controllers\ProfileController;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $doctor = User::query()
        ->where('role', '=', 'doctor')
        ->first();

//    Auth::guard('web')->loginUsingId($doctor->id);



    $patients = $doctor->patients()->orderBy('date', 'asc')->get();

    $patient = Patient::query()->first();
    $patient = $patient->users()->orderBy('date', 'asc')->get();

    return view('welcome', compact('doctor', 'patients', 'patient'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

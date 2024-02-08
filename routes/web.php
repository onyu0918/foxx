<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoxController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


*/

Route::get('/', [DashboardController::class,'index'])->name('dashboard');

Route::get('/fox/{fox}', [FoxController::class,'show'])->name('fox.show');

Route::post('/fox', [FoxController::class,'store'])->name('fox.store');

Route::delete('/fox/{fox}', [FoxController::class,'destroy'])->name('fox.destroy');

Route::get('/terms', function() { return view('terms'); });



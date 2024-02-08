<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoxController;
use App\Http\Controllers\CommentController;
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

Route::get('/fox/{fox}/edit', [FoxController::class,'edit'])->name('fox.edit');

Route::put('/fox/{fox}', [FoxController::class,'update'])->name('fox.update');

Route::post('/fox', [FoxController::class,'store'])->name('fox.store');

Route::delete('/fox/{fox}', [FoxController::class,'destroy'])->name('fox.destroy');

Route::post('/fox/{fox}/comments', [CommentController::class,'store'])->name('fox.comments.store');


Route::get('/terms', function() { return view('terms'); });



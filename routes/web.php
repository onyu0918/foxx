<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoxController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/fox/{fox}', [FoxController::class, 'show'])->name('fox.show');

Route::get('/fox/{fox}/edit', [FoxController::class, 'edit'])->name('fox.edit');

Route::put('/fox/{fox}', [FoxController::class, 'update'])->name('fox.update');

Route::post('/fox', [FoxController::class, 'store'])->name('fox.store');

Route::delete('/fox/{fox}', [FoxController::class, 'destroy'])->name('fox.destroy');

Route::post('/fox/{fox}/comments', [CommentController::class, 'store'])->name('fox.comments.store');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms', function () {
    return view('terms');
});

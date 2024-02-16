<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FoxController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\FoxLikeController;
use App\Http\Controllers\UserController;
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

Route::get('', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('fox', FoxController::class)->except(['index','create','show'])->middleware('auth');

Route::resource('fox', FoxController::class)->only(['show']);

Route::resource('fox.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('show');
Route::resource('users', UserController::class)->only('edit','update')->middleware('auth');

Route::get('profile',[UserController::class,'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow',[FollowerController::class ,'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow',[FollowerController::class ,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('fox/{fox}/like',[FoxLikeController::class ,'like'])->middleware('auth')->name('foxx.like');

Route::post('fox/{fox}/unlike',[FoxLikeController::class ,'unlike'])->middleware('auth')->name('foxx.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/admin', [AdminDashboardController::class, 'index'])->middleware(['auth','admin'])->name('admin.dashboard');

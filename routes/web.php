<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');

// use App\Http\Controllers\DashboardController;

// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get("/", 'AuthController@show');
// Route::get("/login", 'AuthController@login');
Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');

Route::resource('posts', PostsController::class);
Route::get('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('loggedIn');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name("login-user");
Route::get('/registration', [AuthController::class, 'registration'])->name('auth.registration');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name("register-user");
Route::get('dashboardd', [AuthController::class, 'dashboardd']);
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::resource('posts.comments', PostCommentController::class)->only('store');

<?php

use App\Http\Controllers\InstructorController;
use App\Http\Controllers\KeysController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login')->name('login');
// });

Route::livewire('/post/create', 'pages::post.create');

// Profile

Route::get('profile', [ProfileController::class, 'index']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('action-login', [LoginController::class, 'actionLogin'])->name('action-login');
Route::post('action-logout', [LoginController::class, 'actionLogout'])->name('action-logout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    });
});

Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);

Route::resource('locker', LockerController::class);
Route::resource('major', MajorController::class);
Route::resource('key', KeysController::class);
Route::resource('student', StudentController::class);
Route::resource('instructor', InstructorController::class);

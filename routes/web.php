<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

// 
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');

// admin
Route::middleware('auth')->group(function() {
    Route::get('/admin/dashboard/users', [UserController::class, 'index'])->name('admin.dashboard.users');
    Route::get('/admin/dashboard/projects', [ProjectController::class, 'index'])->name('admin.dashboard.projects');
    Route::get('/admin/dashboard/partners', [PartnerController::class, 'index'])->name('admin.dashboard.partners');
});



Route::get('/ss', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index'])->name('user');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

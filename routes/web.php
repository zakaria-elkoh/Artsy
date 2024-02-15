<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Partner\ProjectController as PartnerProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/partner/projects', [PartnerProjectController::class, 'index'])->name('partner.projects');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// projects routes
Route::get('projects/restore/{id}', [ProjectController::class, 'restore'])->name('projects.restore');
Route::post('projects/collaborate/{project}', [ProjectController::class, 'collaborate'])->name('projects.collaborate');
Route::post('projects/uncollaborate/{id}', [ProjectController::class, 'uncollaborate'])->name('projects.uncollaborate');
Route::resource('projects', ProjectController::class);

// admin
Route::middleware(['admin.check', 'auth'])->group(function () {
    Route::get('/admin/dashboard/users', [UserController::class, 'index'])->name('admin.dashboard.users');
    Route::get('/admin/dashboard/projects', [ProjectController::class, 'index'])->name('admin.dashboard.projects');
    Route::get('/admin/dashboard/trash', [DashboardController::class, 'trash'])->name('admin.dashboard.trash');
});

// users route
Route::get('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
Route::resource('users', UserController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

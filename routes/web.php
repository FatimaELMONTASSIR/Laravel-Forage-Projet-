<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Dashboard Routes
    Route::get('/admin-dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/user-dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
    
    // Project Routes
    Route::resource('projects', ProjectController::class);
    
    // Team Routes
    Route::resource('teams', TeamController::class);
    
    // Task Routes
    Route::resource('tasks', TaskController::class);
});
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    // Autres routes...

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

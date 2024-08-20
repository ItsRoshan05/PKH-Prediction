<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PredictController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication routes
Auth::routes();

// Routes requiring authentication
Route::middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/',[DashboardController::class, 'index'])->name('admin.dashboard');

    // User management routes
    Route::resource('admin/users', UserController::class);
    Route::get('/admin/datanb',[DataController::class, 'show']);
    Route::get('/admin/datac45',[DataController::class, 'showc45']);
    Route::get('/admin/datatest',[DataController::class, 'showtest']);
    Route::get('/admin/datatraining',[DataController::class, 'showtrain']);

    // Prediction routes
    Route::prefix('admin')->group(function () {
        Route::get('predict', [PredictController::class, 'showForm'])->name('predict.show');
        Route::post('predict', [PredictController::class, 'predict'])->name('predict.submit');

        Route::get('predictions', [PredictController::class, 'index'])->name('prediction.index');
        Route::delete('predictions/{id}', [PredictController::class, 'destroy'])->name('prediction.destroy');
    });
});

// Home route
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

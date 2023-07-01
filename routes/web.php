<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Controller all route
    Route::controller(AdminController::class)->group(function() {
        Route::get('/admin/index', 'index');
        Route::get('/admin/profile', 'profile');
        Route::get('/admin/editProfile', 'editProfile');
        Route::post('/admin/storeProfile', 'storeProfile')->name('store.profile');

        Route::get('/admin/changePassword', 'changePassword');
        Route::post('/admin/updatePassword', 'updatePassword')->name('update.password');
    });

    // Home slide Controller all route
    Route::controller(HomeController::class)->group(function() {
        Route::get('admin/homeSlide', 'homeSlider')->name('admin.homeSlide');
        Route::post('update/slider', 'updateSlider')->name('update.slider');
    });
});

require __DIR__.'/auth.php';
// end
Route::get('/karyawan/index', function(){
    return view('karyawan.index');
})->middleware(['auth:karyawan'])->name('karyawan.index');

// Route::controller(AdminController::class)->group(function() {
//     Route::get('/admin/index', 'index');
//     Route::get('/admin/profile', 'profile');
//     Route::get('/admin/editProfile', 'editProfile');
//     Route::post('/admin/storeProfile', 'storeProfile')->name('store.profile');

//     Route::get('/admin/changePassword', 'changePassword');
//     Route::post('/admin/updatePassword', 'updatePassword')->name('update.password');
// });
require __DIR__.'/karyawanauth.php';

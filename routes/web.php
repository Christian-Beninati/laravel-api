<?php
// Guest Home Controller
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
// Admin Home Controller
use App\Http\Controllers\Guest\HomeController as AdminHomeController;
// Admin Project Controller
use App\Http\Controllers\Admin\ProjectController;

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
*/

// Guest Home Controller
Route::get('/', [GuestHomeController::class, 'index'])->name('guest.home');

// ? Route Group (ADMIN)
Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Home 
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    // Projects
    Route::resource('projects', ProjectController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('admin/technologies', App\Http\Controllers\Admin\TechnologyController::class, ['as' => 'admin']);
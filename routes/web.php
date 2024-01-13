<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduledClassController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');


/* Instructor Routes */
Route::middleware(['auth', 'role:instructor'])->group(function () {
    Route::get('/instructor/dashboard', function () {
        return view('instructor.dashboard');
    })->name('instructor.dashboard');

    Route::resource('/instructor/schedule', ScheduledClassController::class)
    ->only('index','store','create','destroy');
});


/* Member routes */
Route::middleware(['auth','role:member'])->group(function(){
    Route::get('/member/dashboard', function () {
            return view('member.dashboard');
        })->name('member.dashboard');
    Route::get('/member/book',[BookingController::class, 'create'])->name('booking.create');
    Route::post('/member/bookings',[BookingController::class, 'store'])->name('booking.store');
    Route::get('/member/bookings',[BookingController::class, 'index'])->name('booking.index');
    Route::delete('/member/bookings/{id}',[BookingController::class, 'destroy'])->name('booking.destroy');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/createuser',[RegisteredUserController::class, 'create'])->name('user.create');
    Route::post('/admin/created', [RegisteredUserController::class, 'store'])->name('user.store');
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth','role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UseraccountController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admindashboard');
    });

    Route::controller(UseraccountController::class)->group(function () {
        Route::get('/admin/add-user', 'Adduser')->name('adduser');
        Route::post('/admin/store-user', 'Storeuser')->name('storeuser');
        Route::get('/admin/all-user', 'Alluser')->name('alluser');
        Route::get('/admin/add-bank', 'Addbank')->name('addbank');
        Route::post('/admin/store-bank', 'Storebank')->name('storebank');
        Route::get('/admin/all-bank', 'Allbank')->name('allbank');
        Route::get('/admin/loan-apply', 'Loanapply')->name('loanapply');
        Route::get('/admin/user_info/{id}', 'getUserInfo')->name('user.info');
        Route::post('/admin/load-calculate', 'Loancalculte')->name('loancalculate');
        Route::get('/admin/loan-history-page', 'Loanhistorypage')->name('loanhistorypage');
        Route::get('/admin/loan-history/{id}', 'Loanhistory')->name('loanhistory');
    });

});

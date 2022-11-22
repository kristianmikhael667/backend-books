<?php

use App\Http\Controllers\Admin\BookborrowController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::prefix('administrator')->middleware(['auth:sanctum', 'admin'])->group(function () {
    // Menu Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Menu Users
    Route::resource('users', UserController::class);
    Route::resource('catalog', CatalogController::class);
    Route::resource('book', BookController::class);

    Route::get('/member', [MemberController::class, 'index']);

    Route::get('/databook/borrowbook', [BookborrowController::class, 'index']);
    Route::get('/databook/returnbook', [BookborrowController::class, 'returnbook']);
});

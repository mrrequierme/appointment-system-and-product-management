<?php

use App\Http\Controllers\User\AppointmentController as UserAppointmentController;
use App\Http\Controllers\User\ServicesController as UserServicesController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\HistoryController as UserHistoryController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\HistoryController as AdminHistoryController;
use App\Http\Controllers\Admin\RecordController as AdminRecordController;
use App\Http\Controllers\Admin\ServicesController as AdminServicesController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Guest\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\PetController as UserPetController;

Route::middleware('guest')->group(function () {

    Route::get('/', [GuestController::class, 'index'])->name('home');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/login', function () {
        return redirect()->route('home');
    })->name('login');
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:user')
        ->prefix('user')
        ->name('user.')
        ->group(function () {
            // Pets
            Route::prefix('pets')
                ->name('pets.')
                ->group(function () {
                    Route::get('/create', [UserPetController::class, 'create'])->name('create');
                    Route::post('/', [UserPetController::class, 'store'])->name('store');
                    Route::get('/', [UserPetController::class, 'index'])->name('index');
                    Route::get('/{pet}/edit', [UserPetController::class, 'edit'])->name('edit');
                    Route::put('/{pet}/update', [UserPetController::class, 'update'])->name('update');
                    Route::delete('/{pet}/destroy', [UserPetController::class, 'destroy'])->name('destroy');
                });
            // Appointment
            Route::prefix('appointments')
                ->name('appointments.')
                ->group(function () {
                    Route::get('/', [UserAppointmentController::class, 'index'])->name('index');
                    Route::get('/slots/{date}', [UserAppointmentController::class, 'slots'])->name('slots');
                    Route::post('/', [UserAppointmentController::class, 'store'])->name('store');
                    Route::post('/book', [UserAppointmentController::class, 'book'])->name('book');
                    Route::get('/schedule', [UserAppointmentController::class, 'show'])->name('show');
                });
            // products
            Route::get('/', [UserProductController::class, 'index'])->name('product.index');

            // Services
            Route::get('/services', [UserServicesController::class, 'index'])->name('services.index');
            // history
            Route::get('/history', [UserHistoryController::class, 'index'])->name('history.index');
        });

    Route::middleware('role:admin|staff')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::prefix('appointments')
                ->name('appointments.')
                ->group(function () {
                    Route::get('/', [AdminAppointmentController::class, 'index'])->name('index');
                    Route::put('/{appointment}', [AdminAppointmentController::class, 'noShow'])->name('noShow');
                    Route::post('/{appointment}', [AdminAppointmentController::class, 'markDone'])->name('markDone');
                    Route::get('/{id}/edit', [AdminAppointmentController::class, 'edit'])->name('edit');
                    Route::put('/{id}/update', [AdminAppointmentController::class, 'update'])->name('update');
                });

            Route::get('/histories', [AdminHistoryController::class, 'index'])->name('history.index');

            Route::get('/records', [AdminRecordController::class, 'index'])->name('record.index');
            Route::prefix('services')
                ->name('services.')
                ->group(function () {
                    Route::get('/services', [AdminServicesController::class, 'index'])->name('index');
                    Route::post('/services/store', [AdminServicesController::class, 'store'])->name('store');
                    Route::delete('/{service}', [AdminServicesController::class, 'delete'])->name('delete');
                });

            Route::prefix('products')
                ->name('products.')
                ->group(function () {
                    Route::get('/', [AdminProductController::class, 'index'])->name('index');
                    Route::get('/create', [AdminProductController::class, 'create'])->name('create');
                    Route::post('/store', [AdminProductController::class, 'store'])->name('store');
                    Route::get('/{product}/edit', [AdminProductController::class, 'edit'])->name('edit');
                    Route::put('/{product}/update', [AdminProductController::class, 'update'])->name('update');
                    Route::delete('/{product}/destroy', [AdminProductController::class, 'destroy'])->name('destroy');
                });
            Route::prefix('user')
                ->name('user.')
                ->group(function () {
                    Route::get('/', [AdminUserController::class, 'index'])->name('index');
                    Route::get('/create', [AdminUserController::class, 'create'])->name('create');
                    Route::post('/store', [AdminUserController::class, 'store'])->name('store');
                });
        });
});

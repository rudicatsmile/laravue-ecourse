<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

//Dashboar
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);

    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    // Route::delete('/users', 'UserController@destroyWithChecklist')->name('users.destroy');
    Route::delete('/users', [UserController::class, 'destroyWithChecklist'])->name('users.destroy');


});

require __DIR__.'/auth.php';

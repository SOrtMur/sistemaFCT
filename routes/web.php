<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

// Route::get('/registrar', function () {
//     return view('auth.register');
// })->name('register');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('usuario', UserController::class)->names('user')->middleware('auth', 'role:admin,profesor');
Route::resource('empresa', CompanyController::class)->names('company')->middleware('auth', 'role:admin,tutor');
Route::resource('accion', ActionController::class)->names('action')->middleware('auth', 'role:admin,profesor,alumno');
Route::resource('rol', RoleController::class)->names('role')->middleware('auth', 'role:admin');


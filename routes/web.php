<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;

Route::redirect('/', 'office/auth');
Route::prefix('office')->name('office.')->group(function(){
    Route::prefix('auth')->name('auth.')->group(function(){
        Route::get('',[AuthController::class, 'index'])->name('index');
        Route::post('login',[AuthController::class, 'do_login'])->name('login');
        Route::post('register',[AuthController::class, 'do_register'])->name('register');
    });
    Route::middleware(['auth:web'])->group(function(){
        Route::get('logout',[AuthController::class, 'do_logout'])->name('auth.logout');
        Route::resource('semester', SemesterController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('course', CourseController::class);
        Route::resource('student', StudentController::class);
    });
});
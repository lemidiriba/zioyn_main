<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\StudentController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\SchoolController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');


/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});


Route::group(['middleware' => ['auth']], function () {
    // Route::resource('school', 'SchoolController');
    Route::post('school', [SchoolController::class, 'storeSchool'])->name('schoolregister');
});


Route::group(['prefix' => 'gust'], function () {
    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('privacy', [HomeController::class, 'privacyPolicy'])->name('privacy');
    Route::get('student', [StudentController::class, 'index'])->name('student');
    Route::get('search/', [StudentController::class, 'searchSchool'])->name('search');
    Route::get('schoolhome/{schoolid}', [StudentController::class, 'schoolhome'])->name('schoolhome');
    Route::get('schoolsubject/{schoolid}/{schoolgrade}/{subjectif}', [StudentController::class, 'schoolSubject'])->name('subject');
});
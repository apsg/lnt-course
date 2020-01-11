<?php

use App\Domains\Courses\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

include 'auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', HomeController::class . '@index')->name('home');

Route::group(['prefix' => '/kursy'], function () {
    Route::get('/', CourseController::class . '@index');
    Route::get('/kurs/{course}', CourseController::class . '@show');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', UserController::class, ['except' => ['show']]);
    Route::resource('course', CourseController::class);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => ProfileController::class . '@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => ProfileController::class . '@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => ProfileController::class . '@password']);
});

// Datatables routes
Route::group(['prefix' => 'dt'], function () {
    Route::get('course', CourseController::class . '@datatable');
});

Route::get('{page}', ['as' => 'page.index', 'uses' => PageController::class . '@index']);

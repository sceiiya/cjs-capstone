<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::get('test/google', function () {
    return view('test.googleauth');
});

// Route::get('test/employee/model', function () {
//     return view('test.employee');
// });
Route::get('test/employee/model', [EmployeeController::class, 'testcrud'])->name('employee-crud');
Route::get('test/employee/model/res', [EmployeeController::class, 'testcrud'])->name('employees.index');
Route::post('test/employee/model/register', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('test/employee/model/update', [EmployeeController::class, 'update'])->name('employees.update');


// Google login
// Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('google.login');
// Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

// // Google registration
// Route::get('register/google', 'Auth\RegisterController@redirectToGoogle')->name('google.register');
// Route::get('register/google/callback', 'Auth\RegisterController@handleGoogleCallback');
// Googgle Auth Callback
Route::get('auth/google', [App\Http\Controllers\Auth\Google::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', 'App\Http\Controllers\Auth\Google@handleGoogleCallback');

Route::get('user/logout', [App\Http\Controllers\EmployeeController::class, 'logout'])->name('logout');





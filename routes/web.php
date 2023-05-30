<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ViewController;

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
Route::get('test/employee/model/login', [EmployeeController::class, 'viewlogin'])->name('employees.test.login');
Route::get('test/employee/model/show', [ViewController::class, 'showemployee'])->name('employees.test.show');
// Route::get('test/employee/model/show/edit', [ViewController::class, 'employeeedit'])->name('employees.test.show.edit');
Route::get('test/employee/model/{employee}/edit', [ViewController::class, 'employeeedit'])->name('employee.edit');
Route::get('test/employee/model/{employee}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');

// Googgle Auth Callback
Route::get('auth/google', [App\Http\Controllers\Auth\Google::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', 'App\Http\Controllers\Auth\Google@handleGoogleCallback');

Route::get('user/logout', [App\Http\Controllers\EmployeeController::class, 'logout'])->name('logout');





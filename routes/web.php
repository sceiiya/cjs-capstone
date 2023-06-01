<?php

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PointSystemController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/zzz', function () {
    return view('zzz');
});

Route::get('test/google', function () {
    return view('test.googleauth');
})->name('testt.google');

//admin
Route::prefix('admin')->middleware(['auth', 'authAdmin'])->group(function(){
    Route::post('/test/employee/model/register', [EmployeeController::class, 'store'])->name('admin.employees.store');
    Route::get('/test/employee/model/update', [EmployeeController::class, 'update'])->name('admin.employees.update');
    Route::get('/test/employee/model/login', [EmployeeController::class, 'viewlogin'])->name('admin.employees.test.login');
});

//employee
Route::prefix('team')->middleware(['auth', 'authEmployee'])->group(function(){
    Route::post('/test/employee/model/register', [EmployeeController::class, 'store'])->name('team.employees.store');
    Route::get('/test/employee/model/update', [EmployeeController::class, 'update'])->name('team.employees.update');
    Route::get('/test/employee/model/login', [EmployeeController::class, 'viewlogin'])->name('team.employees.test.login');
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
Route::put('test/employee/model/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');
// Route::delete('test/employee/model/{employee}/delete', [EmployeeController::class, 'destroy'])->name('employee.delete');
Route::put('test/employee/model/{employee}/delete', [EmployeeController::class, 'archive'])->name('employee.delete');

// Route::get('test/employee/model/{employee}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');

// Googgle Auth Callback
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', 'App\Http\Controllers\Auth\GoogleController@handleGoogleCallback');

// Route::get('user/logout', [App\Http\Controllers\EmployeeController::class, 'logout'])->name('logout');

//auths
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//points routes
Route::get('test/points/model/display', [PointSystemController::class, 'index'])->name('display-points');

Route::get('test/points/model/{employeeID}/show', [PointSystemController::class, 'show'])->name('show-points');
Route::put('test/points/model/{employeeID}/{in_add}/{csrf}/increment', [PointSystemController::class, 'increment'])->name('increment-points');
Route::put('test/points/model/{employeeID}/convert', [PointSystemController::class, 'convert'])->name('convert-points');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

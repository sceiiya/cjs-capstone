<?php

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PhGeoLocationsController;
use App\Http\Controllers\PointSystemController;
use App\Http\Controllers\ViewController;
use App\Models\PhGeoLocations;
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

// Route::get('test/google', function () {
//     return view('test.googleauth');
// })->name('testt.google');

// Route::get('test/mail', [MailController::class, 'mail'])->name('first.mail');


//auths
Auth::routes(['verify' => true]);
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
Route::middleware(['verified'])->group(function()
{
    Route::get('/home/verified', [App\Http\Controllers\HomeController::class, 'index'])->name('verifiedhome');
});

// Googgle Auth Callback
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', 'App\Http\Controllers\Auth\GoogleController@handleGoogleCallback');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("Philippines", [PhGeoLocationsController::class, 'show'])->name('applicant.form.phgeoloc');

// Applicant Routes
Route::middleware(['auth', 'authRole:applicant'])->group( function()
// Route::middleware(['auth', 'verified', 'authRole:applicant'])->group( function()
{
    Route::get("home", [ViewController::class, 'applicanthome'])->name('applicant.index');
    // Route::get("home", [HomeController::class, 'applicantHome'])->name('applicant.index');
    Route::get("apply", [ViewController::class, 'applicantform'])->name('applicant.form');
    Route::post("apply/submit", [EmployeeController::class, 'application'])->name('submit.applicant.form');

});

// Employee Routes
Route::prefix('team')->middleware(['auth', 'authRole:employee'])->group( function()
// Route::prefix('team')->middleware(['auth', 'verified', 'authRole:employee'])->group( function()
{
    Route::get("home", [ViewController::class, 'employeehome'])->name('employee.index');
    //points routes
    Route::get('points/display', [PointSystemController::class, 'index'])->name('display-points');
    Route::get('points/{employeeID}/show', [PointSystemController::class, 'show'])->name('show-points');
    Route::put('points/{employeeID}/{in_add}/{csrf}/increment', [PointSystemController::class, 'increment'])->name('increment-points');
    Route::put('points/{employeeID}/convert', [PointSystemController::class, 'convert'])->name('convert-points');

});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'authRole:admin'])->group( function()
// Route::prefix('admin')->middleware(['auth', 'verified', 'authRole:admin'])->group( function()
{
    Route::get("home", [ViewController::class, 'adminhome'])->name('admin.index');

    // Route::get('test/employee/model', function () {
    //     return view('test.employee');
    // });
    Route::get('employee', [EmployeeController::class, 'testcrud'])->name('employee-crud');
    Route::get('employee/res', [EmployeeController::class, 'testcrud'])->name('employees.index');
    Route::post('employee/register', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('employee/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::get('employee/login', [EmployeeController::class, 'viewlogin'])->name('employees.test.login');
    Route::get('employee/show', [ViewController::class, 'showemployee'])->name('employees.test.show');
    // Route::get('test/employee/model/show/edit', [ViewController::class, 'employeeedit'])->name('employees.test.show.edit');
    Route::get('employee/{employee}/edit', [ViewController::class, 'employeeedit'])->name('employee.edit');
    Route::put('employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');
    // Route::delete('test/employee/model/{employee}/delete', [EmployeeController::class, 'destroy'])->name('employee.delete');
    Route::put('employee/{employee}/delete', [EmployeeController::class, 'archive'])->name('employee.delete');
    // Route::get('test/employee/model/{employee}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');

});


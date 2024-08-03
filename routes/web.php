<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

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
    return view ('Users/login');
})->name('login');

Route::post('/adminlogin', [UserController::class, 'Adminlogin'])->name('adminlogin');

Route::get('/employee', [UserController::class, 'create'])->name('employee');
Route::post('/employeeregister', [UserController::class, 'store'])->name('employeeregi');
Route::get('/employeeindex', [UserController::class, 'index'])->name('employindex');
Route::get('/user/search', [UserController::class, 'search'])->name('user.search');

Route::resource('project', ProjectController::class);
Route::get('/search/project', [ProjectController::class, 'search'])->name("project.search");

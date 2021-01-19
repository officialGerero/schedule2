<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[Controllers\DashboardController::class, 'lol'])->middleware(['auth'])->name('dashboard');

Route::view('form','addTeacher');

Route::post('submit',[Controllers\AddTeacherController::class,'addTeacher']);

require __DIR__.'/auth.php';

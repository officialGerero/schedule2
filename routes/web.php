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

Route::view('admin','adminka')->middleware(['admin'])->name('admin');

Route::post('submitTeacher',[Controllers\AddShitToDBController::class,'addTeacher'])->middleware(['admin']);

require __DIR__.'/auth.php';

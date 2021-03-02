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

Route::middleware('admin')->group(function (){

    Route::view('/admin','addsubject')->name('admin');

    Route::post('/submitTeacher',[Controllers\AdminPageController::class,'addTeacher']);
    Route::put('/editTeacher/{id}',[Controllers\AdminPageController::class,'updateTeacher'])->name('edit.teacher');
    Route::get('/admin.show/{id}',[Controllers\AdminPageController::class, 'getTeacher'])->name('edit.prepare');
    Route::get('/admin.delete/{id}',[Controllers\AdminPageController::class, 'deleteTeacher'])->name('edit.delete');

    Route::view('/user','adduser')->name('user.show');
    Route::post('/user',[Controllers\AdminPageController::class, 'addUser'])->name('user.add');
    Route::put('/user/{id}',[Controllers\AdminPageController::class, 'editUser'])->name('user.edit');
    Route::get('/user.show/{id}',[Controllers\AdminPageController::class, 'getUser'])->name('user.get');
    Route::get('/user.delete/{id}',[Controllers\AdminPageController::class, 'deleteUser'])->name('user.delete');

    Route::get('/users', [Controllers\ListsPageController::class,'users'])->name('users');
    Route::get('/subjects', [Controllers\ListsPageController::class,'subjects'])->name('subjects');
});




require __DIR__.'/auth.php';

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

Route::get('/dashboard',[Controllers\DashboardController::class, 'getSubjects'])->middleware(['auth'])->name('dashboard');

Route::middleware('admin')->group(function (){

    Route::view('/admin','addsubject')->name('admin');

    Route::post('/submitTeacher',[Controllers\Admin\SubjectController::class,'addSubject']);
    Route::put('/editTeacher/{id}',[Controllers\Admin\SubjectController::class,'updateSubject'])->name('edit.teacher');
    Route::get('/admin.show/{id}',[Controllers\Admin\SubjectController::class, 'getSubject'])->name('edit.prepare');
    Route::get('/admin.delete/{id}',[Controllers\Admin\SubjectController::class, 'deleteSubject'])->name('edit.delete');

    Route::view('/user','adduser')->name('user.show');
    Route::post('/user',[Controllers\Admin\UserController::class, 'addUser'])->name('user.add');
    Route::put('/user/{id}',[Controllers\Admin\UserController::class, 'editUser'])->name('user.edit');
    Route::get('/user.show/{id}',[Controllers\Admin\UserController::class, 'getUser'])->name('user.get');
    Route::get('/user.delete/{id}',[Controllers\Admin\UserController::class, 'deleteUser'])->name('user.delete');

    Route::view('/schedule/{id}','addschedule')->name('schedule.show');// adding page
    Route::post('/schedule',[Controllers\Admin\ScheduleController::class, 'addSchedule'])->name('schedule.add'); // form add
    Route::put('/schedule/{id}',[Controllers\Admin\ScheduleController::class, 'editSchedule'])->name('schedule.edit');//form edit
    Route::get('/schedule.show/{id}',[Controllers\Admin\ScheduleController::class, 'getSchedule'])->name('schedule.get');//put data into form edit
    Route::get('/schedule.delete/{id}_{returnId}',[Controllers\Admin\ScheduleController::class, 'deleteSchedule'])->name('schedule.delete');// delete user


    Route::get('/users', [Controllers\ListsPageController::class,'users'])->name('users');
    Route::get('/subjects', [Controllers\ListsPageController::class,'subjects'])->name('subjects');
    Route::get('/schedules/{id}', [Controllers\ListsPageController::class,'schedules'])->name('schedules');
});




require __DIR__.'/auth.php';

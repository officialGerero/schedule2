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

Route::get('/dashboard',[Controllers\DashboardController::class, 'getSchedules'])->middleware(['auth'])->name('dashboard');

Route::middleware('admin')->group(function (){

    Route::name('subject.')->group(function (){
        Route::view('/subject.addPage','addsubject')->name('view');
        Route::post('/subject.add',[Controllers\Admin\SubjectController::class,'addSubject'])->name('add');
        Route::put('/subject.edit/{id}',[Controllers\Admin\SubjectController::class,'updateSubject'])->name('edit');
        Route::get('/subject.show/{id}',[Controllers\Admin\SubjectController::class, 'getSubject'])->name('prepare');
        Route::get('/subject.delete/{id}',[Controllers\Admin\SubjectController::class, 'deleteSubject'])->name('delete');
    });

    Route::name('user.')->group(function (){
        Route::view('/user.addPage','adduser')->name('view');
        Route::post('/user.add',[Controllers\Admin\UserController::class, 'addUser'])->name('add');
        Route::put('/user.edit/{id}',[Controllers\Admin\UserController::class, 'editUser'])->name('edit');
        Route::get('/user.show/{id}',[Controllers\Admin\UserController::class, 'getUser'])->name('prepare');
        Route::get('/user.delete/{id}',[Controllers\Admin\UserController::class, 'deleteUser'])->name('delete');
    });

    Route::name('schedule.')->group(function (){
        Route::get('/schedule/{id}',[Controllers\Admin\ScheduleController::class, 'prepareToAddScheduleId'])->name('view');
        Route::post('/schedule',[Controllers\Admin\ScheduleController::class, 'addSchedule'])->name('add');
        Route::put('/schedule/{id}',[Controllers\Admin\ScheduleController::class, 'editScheduleId'])->name('edit');
        Route::put('/schedule',[Controllers\Admin\ScheduleController::class, 'editScheduleAll'])->name('edit');
        Route::get('/schedule.show/{id}',[Controllers\Admin\ScheduleController::class, 'getSchedule'])->name('prepare');
        Route::get('/schedule.delete/{id}_{returnId}',[Controllers\Admin\ScheduleController::class, 'deleteScheduleId'])->name('delete');
        Route::get('/schedule.delete/{id}',[Controllers\Admin\ScheduleController::class, 'deleteScheduleAll'])->name('deleteAtAll');
    });

    Route::get('/users', [Controllers\ListsPageController::class,'users'])->name('users');
    Route::get('/subjects', [Controllers\ListsPageController::class,'subjects'])->name('subjects');
    Route::get('/schedules/{id}', [Controllers\ListsPageController::class,'schedules'])->name('schedules');
    Route::get('/schedules.all', [Controllers\ListsPageController::class,'allSchedules'])->name('schedules.all');
});


require __DIR__.'/auth.php';

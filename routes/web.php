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

    Route::name('subject.')->prefix('subject')->group(function (){
        Route::get('/add',[Controllers\Admin\SubjectController::class,'getUsersInfo'])->name('view');
        Route::post('/add',[Controllers\Admin\SubjectController::class,'addSubject'])->name('add');
        Route::put('/edit/{id}',[Controllers\Admin\SubjectController::class,'updateSubject'])->name('edit');
        Route::get('/show/{id}',[Controllers\Admin\SubjectController::class, 'getSubject'])->name('prepare');
        Route::get('/delete/{id}',[Controllers\Admin\SubjectController::class, 'deleteSubject'])->name('delete');
    });

    Route::name('user.')->prefix('user')->group(function (){
        Route::view('/add','adduser')->name('view');
        Route::post('/add',[Controllers\Admin\UserController::class, 'addUser'])->name('add');
        Route::put('/edit/{id}',[Controllers\Admin\UserController::class, 'editUser'])->name('edit');
        Route::get('/show/{id}',[Controllers\Admin\UserController::class, 'getUser'])->name('prepare');
        Route::get('/delete/{id}',[Controllers\Admin\UserController::class, 'deleteUser'])->name('delete');
    });

    Route::name('schedule.')->prefix('schedule')->group(function (){
        Route::get('/{id}',[Controllers\Admin\ScheduleController::class, 'prepareToAddScheduleId'])->name('view');
        Route::post('/',[Controllers\Admin\ScheduleController::class, 'addSchedule'])->name('add');
        Route::put('/{id}',[Controllers\Admin\ScheduleController::class, 'editSchedule'])->name('edit');
        Route::get('/show/{id}',[Controllers\Admin\ScheduleController::class, 'getSchedule'])->name('prepare');
        Route::get('/delete/{id}',[Controllers\Admin\ScheduleController::class, 'deleteSchedule'])->name('delete');
    });

    Route::get('/users', [Controllers\ListsPageController::class,'users'])->name('users');
    Route::get('/subjects', [Controllers\ListsPageController::class,'subjects'])->name('subjects');
    Route::get('/schedules/all', [Controllers\ListsPageController::class,'allSchedules'])->name('schedules.all');
    Route::get('/schedules/search', [Controllers\ListsPageController::class,'searchSchedules'])->name('schedules.search');
    Route::get('/schedules/{id}', [Controllers\ListsPageController::class,'schedules'])->name('schedules');
});

require __DIR__.'/auth.php';

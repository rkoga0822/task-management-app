<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

//一般ルート
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
});

//管理者ルート
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    //管理者初期画面
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    //管理者でのtodocrud操作
    Route::resource('users', AdminController::class)->except(['show']);
    //ユーザーのtodo全件表示
    Route::get('/tasks',[AdminController::class,'tasks'])->name('tasks.index');
});
require __DIR__ . '/settings.php';

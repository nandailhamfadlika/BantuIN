<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {

    Route::get('/tasks', [UserController::class, 'listTasks'])->name('list-task');
    Route::get('/tasks/create', [UserController::class, 'createTask'])->name('create-task');
    Route::post('/tasks', [UserController::class, 'storeTask'])->name('store-task');
    Route::delete('/tasks/{id}', [UserController::class, 'deleteTask'])->name('delete-task');
    Route::get('/tasks/edit/{id}', [UserController::class, 'editTask'])->name('edit-task');
    Route::post('/tasks/edit/{id}', [UserController::class, 'updateTask'])->name('update-task');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/add-review/{id}', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/store-review/{id}', [ReviewController::class, 'store'])->name('review.store');

});

Route::middleware(['auth.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/add-helpers', [AdminController::class, 'addHelpers'])->name('add-helpers');
    Route::post('/store-helpers', [AdminController::class, 'storeHelpers'])->name('store-helper');

    Route::get('/users', [AdminController::class, 'manageUsers'])->name('manage-users');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');

    Route::get('/helpers', [AdminController::class, 'manageHelpers'])->name('manage-helpers');

    Route::get('/helpers/edit/{id}', [HelperController::class, 'editHelper'])->name('edit-helper');
    Route::post('/helpers/edit/{id}', [HelperController::class, 'updateHelper'])->name('update-helper');

    Route::delete('/helpers/{id}', [AdminController::class, 'deleteHelper'])->name('delete-helper');

    Route::get('/tasks', [AdminController::class, 'viewTasks'])->name('view-tasks');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});

Route::middleware(['auth.helper'])->prefix('helper')->name('helper.')->group(function () {
    Route::get('/dashboard', [HelperController::class, 'dashboard'])->name('dashboard');
    Route::post('/confirm-task/{id}', [HelperController::class, 'confirmTask'])->name('confirm-task');
    Route::post('/complete-task/{id}', [HelperController::class, 'completeTask'])->name('complete-task');

    Route::post('/logout', [HelperController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/admin', [AdminController::class, 'auth'])->name('admin.auth');

    Route::get('/helpers/login', [HelperController::class, 'login'])->name('helper.login');
    Route::post('/helpers/login', [HelperController::class, 'auth'])->name('helper.auth');

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'auth'])->name('auth');

    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('store');
});
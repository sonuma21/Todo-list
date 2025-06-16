<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskManager::class, 'listTasks'])->name('home');


// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/addtask', [TaskManager::class, 'addTask'])->name('task.add');
    Route::post('/add/task/post', [TaskManager::class, 'addTaskPost'])->name('task.add.post');
    Route::get('/update/task/{id}', [TaskManager::class, 'updateTaskStatus'])->name('task.update.status');
    Route::get('/delete/task/{id}', [TaskManager::class, 'deleteTaskStatus'])->name('task.delete.status');
});

require __DIR__ . '/auth.php';

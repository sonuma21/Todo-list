<?php

use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskManager::class, 'listTasks'])->name('home');
Route::get('/addtask', [TaskManager::class, 'addTask'])->name('task.add');
Route::post('/add/task/post', [TaskManager::class, 'addTaskPost'])->name('task.add.post');
Route::get('/update/task/{id}', [TaskManager::class, 'updateTaskStatus'])->name('task.update.status');
Route::get('/delete/task/{id}', [TaskManager::class, 'deleteTaskStatus'])->name('task.delete.status');

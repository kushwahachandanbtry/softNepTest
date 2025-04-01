<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;




Route::get('/', [TaskController::class, 'index'])->name('task.show');
Route::get('/taks/add', [TaskController::class, 'add'])->name('task.add');

Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{id}/update', [TaskController::class, 'update'])->name('task.update');
Route::put('/task/update-status/{id}', [TaskController::class, 'updateStatus'])->name('update.status');



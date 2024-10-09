<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\ProjectsController::class,'index'])->name('projects.index');
Route::get('/projects/{project}',[\App\Http\Controllers\ProjectsController::class,'show'])->name('projects.show');

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'home']);
Route::get('/contact-us', [App\Http\Controllers\PageController::class, 'contact']);

// Backend routes
Route::get('/backend/categories', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('backend.categories.index');
Route::get('/backend/categories/create', [App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('backend.categories.create');
Route::post('/backend/categories', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('backend.categories.store');
Route::get('/backend/categories/{category}/edit', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('backend.categories.edit');
Route::put('/backend/categories/{category}', [App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('backend.categories.update');
Route::delete('/backend/categories/{category}', [App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('backend.categories.destroy');
Auth::routes();

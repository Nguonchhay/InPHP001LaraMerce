<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'home']);
Route::get('/contact-us', [App\Http\Controllers\PageController::class, 'contact']);

// Backend routes
Route::group([
    'middleware' => 'auth',
    'prefix' => 'backend'
], function() {

    // Admin role
    Route::group([
        'middleware' => \App\Http\Middleware\BackendRoleMiddleware::class
    ], function() {
        Route::get('/categories', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('backend.categories.index');
        Route::get('/categories/create', [App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('backend.categories.create');
        Route::post('/categories', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('backend.categories.store');
        Route::get('/categories/{category}/edit', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('backend.categories.edit');
        Route::put('/categories/{category}', [App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('backend.categories.update');
        Route::delete('/categories/{category}', [App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('backend.categories.destroy');    
    });

    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard.index');
    
   
    Route::resource(
        'products',
        App\Http\Controllers\Backend\ProductController::class,
        [ 'as' => 'backend']
    );
});



Auth::routes();

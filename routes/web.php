<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

// Make use of direct Controller@action with namespace in provider
// https://laracasts.com/discuss/channels/laravel/laravel-8-error-target-class-homecontroller-does-not-exist

/**
 * Improve it with Resource Routes!
 */

Route::get('/', function () {
    return view('home');
})->name('home');

/*
|--------------------------------------------------------------------------
| ONLY LOGIN PAGES ROUTES - DISABLE IF YOU DO NOT LIKE USERS TO REGISTER
|--------------------------------------------------------------------------
*/
Auth::routes([
    // 'register' => false
]);

// Admin Dashboard
Route::middleware('auth')->group(function() {
    Route::get('/category/create', [CategoryController::class, 'create'])->name('createcategory');
    Route::post('/category/create', [CategoryController::class, 'store']);

    Route::get('/{category}/post/create', [PostController::class, 'create'])->name('createpost');
    Route::post('/{category}/post/create', [PostController::class, 'store']);
    Route::get('/{category}/{postslug}/edit', [PostController::class, 'edit'])->name('editpost');
    Route::post('/{category}/{postslug}/edit', [PostController::class, 'update']);
    Route::get('/{category}/{postslug}/delete', [PostController::class, 'destroy'])->name('deletepost');
});

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/{category}', [CategoryController::class, 'index']);
Route::get('/{category}/{postslug}', [PostController::class, 'index']);


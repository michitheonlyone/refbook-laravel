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
| ONLY LOGIN PAGES ROUTES
|--------------------------------------------------------------------------
*/
Auth::routes([
    // 'register' => false
]);

// Admin Dashboard
// Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::middleware('auth')->group(function() {
    Route::get('/category/create', [CategoryController::class, 'create'])->name('createcategory');
    Route::post('/category/create', [CategoryController::class, 'store']);

    Route::get('/{category}/post/create', [PostController::class, 'create'])->name('createpost');
    Route::post('/{category}/post/create', [PostController::class, 'store']);
});

// Post CRUD Routes
// Route::get('/{category}/post/create', [PostController::class, 'create'])->name('createpost')->middleware('auth');
// Route::post('/{category}/post/create', [PostController::class, 'store']);

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Route::get('/page', 'PostController@index'); ?? does not work!
Route::get('/{category}', [CategoryController::class, 'index']);
Route::get('/{category}/{postslug}', [PostController::class, 'index']);
// Route::get('/{post}', function ($post) {
//     return 'User '.$post;
// });
// Route::get('/page', [PostController::class, 'show']);


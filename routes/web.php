<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/page', 'PostController@index'); ?? does not work!
Route::get('/{category}/{postslug}', [PostController::class, 'show']);
// Route::get('/{post}', function ($post) {
//     return 'User '.$post;
// });
Route::get('/page', [PostController::class, 'show']);

/*
|--------------------------------------------------------------------------
| ONLY LOGIN PAGES ROUTES
|--------------------------------------------------------------------------
*/
Auth::routes();

// Admin Dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

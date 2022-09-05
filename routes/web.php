<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [ProductController::class, 'index']);

    Route::get('/add_product', [ProductController::class, 'page']);

    Route::post('insert-product', [ProductController::class, 'insert']);

    Route::get('product-status/{id}', [ProductController::class, 'status']);

    Route::get('delete-product/{id}', [ProductController::class, 'delete']);

    Route::get('edit-product/{id}', [ProductController::class, 'edit']);

    Route::put('update-product/{id}', [ProductController::class, 'update']);
});

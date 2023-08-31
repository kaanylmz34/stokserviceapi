<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OriginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api')->group(function()
{
    Route::prefix('/origin')->group(function()
    {
        Route::post('/create', [OriginController::class, 'create']);
        Route::put('/update', [OriginController::class, 'update']);
        Route::delete('/delete', [OriginController::class, 'delete']);
    });

    Route::get('/products', [ProductController::class, 'getAllProducts']);
    Route::prefix('/product')->group(function()
    {
        Route::post('/create', [ProductController::class, 'create']);
        Route::put('/update', [ProductController::class, 'update']);
        Route::delete('/delete', [ProductController::class, 'delete']);
    });
});

require __DIR__.'/auth.php';

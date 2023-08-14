<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedisController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix'=>'redis'], function () {
    Route::get('/', [RedisController::class, 'index'])->name('redis.index');
});

Route::group(['prefix'=>'rabbitmq'], function () {
    Route::post('/create-log', [LogController::class, 'createLog'])->name('log.create');
});

Route::group(['prefix'=>'item', 'middleware'=> 'auth'], function () {
    Route::get('/', [ItemController::class, 'index'])->name('item.index');
});

require __DIR__.'/auth.php';

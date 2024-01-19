<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ChartController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/graph',[ChartController::class, 'show'])->middleware(['auth', 'verified'])->name('graph');

Route::controller(FoodController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('Home');
    Route::post('/foods', 'store')->name('store');
    Route::get('/foods/create', 'create')->name('create');
    Route::get('/foods/{food}', 'show')->name('show');
    Route::put('/foods/{food}', 'update')->name('update');
    Route::delete('/foods/{food}', 'delete')->name('delete');
    Route::get('/foods/{food}/edit', 'edit')->name('edit');
});

Route::controller(RecordController::class)->middleware(['auth'])->group(function(){
    Route::get('/records', 'index')->name('index');
    Route::post('/records', 'store')->name('store');
    Route::get('/records/create', 'create')->name('create');
    Route::get('/records/{record}', 'show')->name('show');
    Route::put('/records/{record}', 'update')->name('update');
    Route::delete('/records/{record}', 'delete')->name('delete');
    Route::get('/records/{record}/edit', 'edit')->name('edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

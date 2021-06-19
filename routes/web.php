<?php

use App\Http\Controllers\BrandController;
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
    return view('website.home');
});

require __DIR__.'/auth.php';

//admin
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::prefix('/brand')->group(function () {
        Route::get('/add-brand',[BrandController::class,'add_brand'])->name('add-brand');
        Route::post('/save-brand',[BrandController::class,'save_brand'])->name('save-brand');
        Route::get('/manage-brand',[BrandController::class,'manage_brand'])->name('manage-brand');
        Route::get('/active-brand/{id}',[BrandController::class,'active_brand'])->name('active-brand');
        Route::get('/inactive-brand/{id}',[BrandController::class,'inactive_brand'])->name('inactive-brand');
        Route::get('/delete-brand/{id}',[BrandController::class,'delete_brand'])->name('delete-brand');
    });
});

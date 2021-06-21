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
        Route::get('/delete-brand/{id}',[BrandController::class,'delete_brand'])->name('delete-brand');
        Route::get('/edit-brand/{id}',[BrandController::class,'edit_brand'])->name('edit-brand');
        Route::post('/update-brand/{id}',[BrandController::class,'update_brand'])->name('update-brand');
        Route::get('/brandStatus/{id}/{s}',[BrandController::class,'brandStatus'])->name('brandStatus');
    });
});

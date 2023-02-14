<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\{
    CategoryController,
    AjaxRequestController,
    VariationController,


};


Route::get('/',[PageController::class,'home'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {        return view('admin.dashboard');    })->name('dashboard');
    Route::get('/category-table', [AjaxRequestController::class, 'categoryTable'])->name('category-table');

    Route::resource('categories', CategoryController::class);
    Route::resource('variations', VariationController::class);
});



require __DIR__.'/auth.php';

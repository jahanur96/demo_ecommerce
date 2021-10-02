<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/
Auth::routes();

Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin-logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::group(['prefix'=>'admin','middleware'=>'is_admin'],function () {
    // category
    Route::group(['prefix'=>'category'],function () {
        Route::get('/index', [CategoryController::class,'category_index'])->name('category.index');
        Route::post('/post', [CategoryController::class,'category_add'])->name('category.add');
        
    });
});

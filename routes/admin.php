<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\SettingsController;
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
Route::get('/admin/change-password', [AdminController::class, 'admin_changePassword'])->name('admin.password.change')->middleware('is_admin');
Route::post('/admin/update-password', [AdminController::class, 'admin_updatePassword'])->name('admin.password.update')->middleware('is_admin');
Route::group(['prefix'=>'admin','middleware'=>'is_admin'],function () {
    // category
    Route::group(['prefix'=>'category'],function () {
        Route::get('/index', [CategoryController::class,'category_index'])->name('category.index');
        Route::get('/edit/{id}', [CategoryController::class,'category_edit']);
        Route::get('/delete/{id}', [CategoryController::class,'category_delete'])->name('category.delete');
        Route::post('/post', [CategoryController::class,'category_add'])->name('category.add');
        Route::post('/update', [CategoryController::class,'category_update'])->name('category.update');
        
    });

    Route::group(['prefix'=>'subcategory'],function () {
        Route::get('/index', [SubCategoryController::class,'subcategory_index'])->name('subcategory.index');
        Route::get('/edit/{id}', [SubCategoryController::class,'subcategory_edit']);
        Route::get('/delete/{id}', [SubCategoryController::class,'subcategory_delete'])->name('subcategory.delete');
        Route::post('/post', [SubCategoryController::class,'subcategory_add'])->name('subcategory.add');
        Route::post('/update', [SubCategoryController::class,'subcategory_update'])->name('subcategory.update');
        
    });

    Route::group(['prefix'=>'childcategory'],function () {
        Route::get('/index', [ChildCategoryController::class,'childcategory_index'])->name('childcategory.index');
        Route::get('/edit/{id}', [ChildCategoryController::class,'childcategory_edit']);
        Route::get('/delete/{id}', [ChildCategoryController::class,'childcategory_delete'])->name('childcategory.delete');
        Route::post('/post', [ChildCategoryController::class,'childcategory_add'])->name('childcategory.add');
        Route::post('/update/{id}', [ChildCategoryController::class,'childcategory_update'])->name('childcategory.update');
        
    });
    
    // Brand
    Route::group(['prefix'=>'brand'],function () {
        Route::get('/index', [BrandController::class,'brand_index'])->name('brand.index');
        Route::get('/edit/{id}', [BrandController::class,'brand_edit']);
        Route::get('/delete/{id}', [BrandController::class,'brand_delete'])->name('brand.delete');
        Route::post('/post', [BrandController::class,'brand_add'])->name('brand.add');
        Route::post('/update/{id}', [BrandController::class,'brand_update'])->name('brand.update');
        
    });
    //setting Routes 
		//seo setting
		Route::group(['prefix'=>'seo'], function(){
			Route::get('/index', [SettingsController::class,'seo_index'])->name('seo.setting');
            Route::post('/update/{id}', [SettingsController::class,'seoUpdate'])->name('seo.setting.update');
			
	    });
		//smtp setting
		Route::group(['prefix'=>'smtp'], function(){
			Route::get('/index', [SettingsController::class,'smtp_index'])->name('smtp.setting');
            Route::post('/update/{id}', [SettingsController::class,'smtpUpdate'])->name('smtp.setting.update');
			
	    });

        
});

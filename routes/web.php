<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['as'=>'admin.','prefix'=>'admin/','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('category','\App\Http\Controllers\Admin\CategoryController');
    Route::resource('subcategory','\App\Http\Controllers\Admin\SubCategoryController');
    Route::resource('brands','\App\Http\Controllers\Admin\BrandController');
    Route::resource('products','\App\Http\Controllers\Admin\ProductController');
    Route::get('get-sub-category',[AjaxController::class,'getSubCategory'])->name('getSubCategory');
});

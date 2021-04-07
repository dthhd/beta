<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\SliderController; 
use App\Http\Controllers\BrandController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\HomeController; 

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

Route::get('/', [HomeController::class,'index']);
//Home
Route::post('/auth/save',[MainController::class,'save'])->name('auth.save');


//Auth
Route::post('/auth/save',[MainController::class,'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class,'check'])->name('auth.check');

Route::get('/auth/logout',[MainController::class,'logout'])->name('auth.logout');

Route::get('/admin/dashboard',[MainController::class, 'dashboard']);

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/login',[MainController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[MainController::class, 'register'])->name('auth.register');
    Route::get('/admin/dashboard',[MainController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/category',[CategoryController::class, 'category']);
//slider
    Route::get('/admin/slider/add-slider',[SliderController::class, 'add_slider'])->name('add.slider');
    Route::get('/admin/slider/show-slider',[SliderController::class, 'show_slider'])->name('show.slider');
    Route::get('/edit-slider/{slider_id}',[SliderController::class, 'edit_slider'])->name('edit.slider');
    route::get('/active-slider/{slider_id}',[SliderController::class,'active_slider']);
    route::get('/unactive-slider/{slider_id}',[SliderController::class,'untive_slider']);
    route::get('/delete-slider/{slider_id}',[SliderController::class,'delete_slider']);
    Route::post('/admin/slider/insert_slider',[SliderController::class, 'insert_slider'])->name('insert.slider');
    Route::post('/update-slider/{slider_id}',[SliderController::class, 'update_slider'])->name('update.slider');


//category
Route::get('/admin/category/add-category',[CategoryController::class, 'add_category'])->name('add.category');
Route::get('/admin/category/show-category',[CategoryController::class, 'show_category'])->name('show.category');
Route::get('/edit-category/{category_id}',[CategoryController::class, 'edit_category'])->name('edit.category');
Route::get('/active-category/{category_id}',[CategoryController::class, 'active_category'])->name('active.category');
Route::get('/unactive-category/{category_id}',[CategoryController::class, 'unactive_category'])->name('unactive.category');
Route::get('/delete-category/{category_id}',[CategoryController::class, 'delete_category'])->name('delete.category');
Route::post('/admin/category/insert-category',[CategoryController::class, 'insert_category'])->name('insert.category');
Route::post('/update-category/{category_id}',[CategoryController::class, 'update_category'])->name('update.category');

//Brand

route::get('admin/brand/add-brand',[BrandController::class, 'add_brand'])->name('add.brand');
route::get('admin/brand/show-brand',[BrandController::class, 'show_brand'])->name('show.brand');
route::get('/edit-brand/{brand_id}',[BrandController::class, 'edit_brand'])->name('edit.brand');
route::get('/active-brand/{brand_id}',[BrandController::class, 'active_brand']);
route::get('/unactive-brand/{brand_id}',[BrandController::class, 'unactive_brand']);
route::get('/delete-brand/{brand_id}',[BrandController::class, 'delete_brand']);
route::post('admin/brand/insert-brand',[BrandController::class, 'insert_brand'])->name('insert.brand');
route::post('/update-brand/{brand_id}',[BrandController::class, 'update_brand'])->name('update.brand');


//Product

route::get('admin/product/add-product',[ProductController::class, 'add_product'])->name('add.product');
route::get('admin/product/show-product',[ProductController::class, 'show_product'])->name('show.product');
route::get('/active-product/{product_id}',[ProductController::class, 'active_product']);
route::get('/unactive-product/{product_id}',[ProductController::class, 'unactive_product']);
route::get('/delete-product/{product_id}',[ProductController::class, 'delete_product']);
route::get('/edit-product/{product_id}',[ProductController::class, 'edit_product']);

route::post('admin/product/insert-product',[ProductController::class, 'insert_product'])->name('insert.product');
route::post('/update-product/{product_id}',[ProductController::class, 'update_product']);


});

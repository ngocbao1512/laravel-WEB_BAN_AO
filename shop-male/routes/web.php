<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Client\BlogClientController as BlogClient;
use App\Http\Controllers\Admin\Dashboard;
/* client */

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home-page', function () {
    return view('home-page');
})->name('home-page');
Route::get('/shop', function () {
    return view('my-directory.shop');
});
Route::get('/about', function () {
    return view('my-directory.about');
});
Route::get('/shop-details', function () {
    return view('my-directory.shop-details');
});
Route::get('/shop-cart', function () {
    return view('my-directory.shop-cart');
});
Route::get('/checkout', function () {
    return view('my-directory.checkout');
});

Route::get('/contact', function () {
    return view('my-directory.contact');
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::resource('products', AdminProductController::class);

    Route::resource('categories', AdminCategoryController::class);

    Route::resource('brands', AdminBrandController::class);

    Route::resource('blogs', AdminBlogController::class);

    Route::resource('tags', AdminTagController::class);
    
});

/* client */


/* Route::get('/blog-details', function () {
    return view('my-directory.blog-details');
}); */

Route::resource('/blogclients',BlogClient::class)->only([
    'index','show'
]);


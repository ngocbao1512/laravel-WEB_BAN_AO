<?php

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
<<<<<<< HEAD

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
=======
Route::get('/home-page', function () {
    return view('home-page');
});
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
Route::get('/blog', function () {
    return view('my-directory.blog');
});
Route::get('/blog-details', function () {
    return view('my-directory.blog-details');
});
Route::get('/contact', function () {
    return view('my-directory.contact');
});
Route::get('/admin', function () {
    return view('my-admin.home-page');
});
>>>>>>> a57017c151e2203661501a15843ede39283f9132

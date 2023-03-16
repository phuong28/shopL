<?php

use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */


Auth::routes();
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class , 'store'])->name('store');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class , 'viewLogin'])->name('login');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class , 'index'])->name('register');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class , 'login'])->name('login');
Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class , 'index']);
    Route::get('/', [App\Http\Controllers\HomeController::class , 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class , 'logout'])->name('logout');
    Route::get('/shop', [App\Http\Controllers\Web\ShopController::class , 'index'])->name('shop');
    Route::get('/categories/showProducts', [App\Http\Controllers\Web\CategoriesController::class , 'showProducts'])->name('categories');
    Route::get('/categories/shopProducts', [App\Http\Controllers\Web\ShopController::class , 'shopProducts'])->name('shopcategories');
    Route::get('/shortIn', [App\Http\Controllers\Web\ShopController::class , 'sortIn'])->name('shortIn');
    Route::get("/products/viewProducts/{id}", [App\Http\Controllers\Web\ProductsController::class , 'viewProducts'])->name('products');
    Route::get('/cart', [App\Http\Controllers\Web\CartController::class , 'index'])->name('view');
    Route::get("/cart/add/{id}", [App\Http\Controllers\Web\CartController::class , 'add'])->name('cart');
    Route::post("/cart/modify/{id}", [App\Http\Controllers\Web\CartController::class , 'modify'])->name('cartM');
    Route::get("/cart/delete/{id}", [App\Http\Controllers\Web\CartController::class , 'delete'])->name('cartD');
    Route::get('/checkout', [App\Http\Controllers\Web\CheckoutController::class , 'index'])->name('checkout');
    Route::post('/order', [App\Http\Controllers\Web\OrderController::class , 'create'])->name('order');
    Route::get('/order/back', [App\Http\Controllers\Web\OrderController::class , 'back'])->name('orderback');
    Route::get('/contact', [App\Http\Controllers\Web\ContactController::class , 'index'])->name('contact');
    Route::post('/contact/create', [App\Http\Controllers\Web\ContactController::class , 'create'])->name('requestContact');
    Route::get('/search', [App\Http\Controllers\Web\ProductsController::class , 'search'])->name('search-products');
});
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/admin/home",[App\Http\Controllers\HomeController::class,'indexadmin'])->name('home.admin');
});
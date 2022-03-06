<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\dashboard\BlogController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\HandmadeCategory\Category;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\FirebaseAuthController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\HandmadeCategory\CategoryController;
use App\Http\Controllers\CustomerDashboard\CustomerDashboardController;

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

// Route::get('/firebase-auth', [FirebaseAuthController::class, 'index']);
Route::get('/', [HomeController::class,'index'])->name('home');

Route::group(['prefix' => 'miracle77','middleware'=>('auth:admin')], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('product/categories', 'HandmadeCategory\CategoryController');
    Route::resource('product/types', 'HandmadeCategory\TypeController');
    Route::resource('products','dashboard\ProductController');
    Route::get('/type_get/{id}', [ProductController::class, 'getType'])->name('type_get');
});

Route::group(['prefix' => 'customer','middleware'=>('auth:customer')],function(){
    Route::get('/account', [CustomerDashboardController::class, 'index'])->name('account');
    Route::get('/signout', [CustomerAuthController::class, 'logout'])->name('signout');
    Route::post('/product/add_normal/{id}', [CustomerProductController::class, 'addToCartNormal'])->name('add.normal');
    Route::post('/product/add_customize/{id}', [CustomerProductController::class, 'addToCartCustomize'])->name('add.customize');
    Route::get('/product/quantity-update/{id}', [CustomerDashboardController::class, 'updateQuantity'])->name('quantity.update');
    Route::delete('/product/cancel/{id}', [CustomerDashboardController::class, 'productCancel'])->name('product.cancel');
    Route::post('/cart/buy/{id}',[CustomerDashboardController::class, 'cartBuy'])->name('cart.buy');
    Route::get('/cart-history', [CustomerDashboardController::class, 'cartHistory'])->name('cart.history');
    Route::get('/cart-detail/{id}', [CustomerDashboardController::class, 'cartDetail'])->name('cart.detail');
    Route::post('/product/add/wishlist{id}',[CustomerProductController::class,'addToWishlist'])->name('add.wishlist');
    Route::delete('/product/remove/wishlist/{id}',[CustomerProductController::class,'removeWishlist'])->name('remove.wishlist');
    Route::get('/wishlist',[CustomerDashboardController::class,'wishlist'])->name('wishlist');
});
Route::resource('/product','CustomerProductController');
Route::any('/search/products', [CustomerProductController::class, 'searchByName'])->name('search.products');
Route::post('/filter/products', [CustomerProductController::class, 'searchByFilter'])->name('filter.products');
Route::get('/about', [HomeController::class,'about'])->name('about');



Route::put('/product/{$id}', [ProductController::class, 'detailById'])->name('product');
Route::get('/blogs',[BlogController::class, 'getBlogs'])->name('blogs');

// Route::get('/email/verify', [EmailVerificationController::class,'show'])->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
// Route::post('/email/resend', [EmailVerificationController::class,'resend'])->name('verification.resend');

Route::get('miracle77/login', [AuthController::class, 'getLogin']);
Route::post('miracle77/login', [AuthController::class, 'submitLogin']);

Route::get('customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::post('customer/login', [CustomerAuthController::class, 'submitLogin']);

Route::get('customer/register', [CustomerAuthController::class, 'showCustomerRegisterForm'])->name('customer.register');
Route::post('customer/register/submit', [CustomerAuthController::class, 'customerRegister']);




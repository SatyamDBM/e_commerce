<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

// ✅ Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // ✅ User Dashboard
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
    Route::post('/user/dashboard/upload/photo', [DashboardController::class, 'userProfile_Upload'])->name('upload.photo');

    // ✅ Wishlist
    Route::post('/wishlist/add/{id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::get('/wishlist', [WishlistController::class, 'myWishlist'])->name('wishlist.view');

    // ✅ Cart
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/confirm', [CartController::class, 'confirmOrder'])->name('checkout.confirm');
    Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('user.orders');
    Route::get('/my-orders/{id}', [OrderController::class, 'show'])->name('user.orders.show');

});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by admin middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    // ✅ User Management
    Route::get('/user/{id}/edit', [DashboardController::class, 'editUserForm'])->name('admin.user.edit');
    Route::post('/user/{id}/update', [DashboardController::class, 'updateUser'])->name('admin.user.update');
    Route::delete('/user/{id}', [DashboardController::class, 'deleteUser'])->name('admin.user.delete');

    // ✅ Product Management
    Route::get('/add-product', [ProductController::class, 'showForm'])->name('admin.add.product');
    Route::post('/add-product', [ProductController::class, 'store'])->name('admin.store.product');
});

/*
|--------------------------------------------------------------------------
| Product Routes (Public)
|--------------------------------------------------------------------------
*/
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [ProductController::class, 'liveSearch'])->name('search');

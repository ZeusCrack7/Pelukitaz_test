<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InventoryController;


// Carrito y Home
Route::get('/', [CustomAuthController::class, 'index'])->name('login');
Route::get('/shop', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/clear_one', [CartController::class, 'clear_one'])->name('cart.clear_one');
Route::get('/candies', [CartController::class, 'candies'])->name('candies');
Route::get('/spicy', [CartController::class, 'spicy'])->name('spicy');
Route::get('/drinks', [CartController::class, 'drinks'])->name('drinks');
Route::get('/choco', [CartController::class, 'choco'])->name('choco');
Route::get('/accesories', [CartController::class, 'accesories'])->name('accesories');
Route::get('/hair', [CartController::class, 'hair'])->name('hair');

// Usuarios
Route::get('/dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');
//Permisos admin
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 

// Inventario admin
Route::get('/stock', [ProductController::class, 'stock'])->name('products.stock');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'editForm'])->name('products.editForm');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::resource('products', ProductController::class);



//Ventas
// Route::post('/checkout/proceed', [CartController::class, 'proceedToCheckout'])->name('checkout.proceed');
// Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
Route::post('/checkout', [SalesController::class, 'store'])->name('sales.store');
Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');





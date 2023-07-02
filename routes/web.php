<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrdersPanelController;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('product/show/{id}', [HomeController::class, 'show'])->name('product.show');
Route::get('products/show', [HomeController::class, 'show_products'])->name('products.show');
Route::get('product/search', [ProductsController::class, 'search'])->name('product.search');

//Cart Routes
Route::post('cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/show', [CartController::class, 'show'])->name('cart.show');
Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

//Orders Routes
Route::post('orders/make_order', [OrdersController::class, 'make_order'])->name('orders.make_order');
Route::get('order/show', [OrdersController::class, 'show'])->name('order.show');


//Admin Routes
Route::group(['prefix' => 'admin'], function () {
    //Category Routes
    Route::get('category', [CategoriesController::class, 'index'])->name('category.index');
    Route::post('category/store', [CategoriesController::class, 'store'])->name('category.store');
    Route::get('category/delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');
    //Products Routes
    Route::get('products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('products/delete/{id}', [ProductsController::class, 'delete'])->name('products.delete');
    Route::get('products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::post('products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    //Orders Routes
    Route::get('orders/index', [OrdersPanelController::class, 'index'])->name('orders.index');
    Route::get('orders/delivered{id}', [OrdersPanelController::class, 'delivered'])->name('orders.delivered');
    Route::get('orders/print{id}', [OrdersPanelController::class, 'print'])->name('orders.print');
    Route::get('orders/search', [OrdersPanelController::class, 'search'])->name('orders.search');
});

<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Clients\ProductsController as ClientsProductsController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// List
Route::get('/', [ClientsProductsController::class, 'index'])->name('home');
Route::get('/listProduct', [ClientsProductsController::class, 'listProducts'])->name('listProducts');
Route::get('/DetailProduct/{id}', [ClientsProductsController::class, 'detail'])->name('detailProduct');
// crud product
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // product
    Route::get('/indexAdmin', [ProductsController::class, 'index'])->name('indexAdmin');
    Route::get('/createProduct', [ProductsController::class, 'createProduct'])->name('createProduct');
    Route::post('/addProduct', [ProductsController::class, 'addProduct'])->name('addProduct');
    Route::get('/editProduct/{id}', [ProductsController::class, 'editProduct'])->name('editProduct');
    Route::put('/updateProduct/{id}', [ProductsController::class, 'updateProduct'])->name('updateProduct');
    Route::get('/deleteProduct/{id}', [ProductsController::class, 'deleteProduct'])->name('deleteProduct');

    // account
    Route::get('/indexAccount', [ProductsController::class, 'indexAccount'])->name('indexAccount');
    Route::get('/createAccount', [ProductsController::class, 'createAccount'])->name('createAccount');
    Route::post('/createAccount', [ProductsController::class, 'addAccount'])->name('addAccount');
    Route::get('/editAccount/{id}', [ProductsController::class, 'editAccount'])->name('editAccount');
    Route::put('/updateAccount/{id}', [ProductsController::class, 'updateAccount'])->name('updateAccount');
    Route::get('/deleteAccount/{id}', [ProductsController::class, 'deleteAccount'])->name('deleteAccount');
    // category
    Route::get('/admin/categories/{id}', [AdminController::class, 'cateProductAdmin'])->name('cateProductAdmin');
});

//cate
Route::get('/categories/{id}', [ClientsProductsController::class, 'cateProduct'])->name('cateProduct');

// auth
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('postRegister');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

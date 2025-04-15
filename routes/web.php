<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\AdminProfileController;

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

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Product routes
Route::prefix('products')->group(function () {
    Route::get('/product-single/{id}', [ProductsController::class, 'singleproduct'])->name('product.single');
    Route::post('/product-single/{id}', [ProductsController::class, 'addtolist'])->name('add.list');
    Route::get('/list', [ProductsController::class, 'list'])->name('list');
    Route::get('/return/{id}', [ProductsController::class, 'returnProduct'])->name('retunToShelf');
    Route::get('/fulllist', [ProductsController::class, 'fulllist'])->name('fulllist');
});

// User profile routes
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin authentication routes
Route::get('/admins/login', [AdminsController::class, 'viewLogin'])
    ->name('view.login')
    ->middleware('check.for.login');
Route::post('/admins/login', [AdminsController::class, 'checkLogin'])->name('check.login');

// Admin protected routes
Route::prefix('admins')
    ->middleware('auth:admin')
    ->group(function () {
        Route::get('index', [AdminsController::class, 'index'])->name('admins.dashboard');
        Route::get('allusers', [AdminsController::class, 'DisplayAllUsers'])->name('all.users');
        
        // Admin management
        Route::get('createadmin', [AdminsController::class, 'CreateAdmin'])->name('create.admin');
        Route::post('createadmin', [AdminsController::class, 'StoreAdmin'])->name('store.admin');
        Route::get('viewuser', [AdminsController::class, 'viewUser'])->name('admin.viewuser');
        
        // Product management
        Route::get('allproducts', [AdminsController::class, 'DisplayProducts'])->name('all.products');
        Route::get('createproduct', [AdminsController::class, 'CreateProduct'])->name('create.product');
        Route::post('createproduct', [AdminsController::class, 'storeProduct'])->name('store.product');
        Route::get('allproducts/{id}', [AdminsController::class, 'deleteProduct'])->name('delete.product');
        
        // Admin profile
        Route::get('editprofile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('editprofile', [AdminProfileController::class, 'update'])->name('profile.update');
    });






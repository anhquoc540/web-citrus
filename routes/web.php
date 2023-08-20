<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Disease\DiseaseController;
use App\Http\Controllers\Admin\Therapy\TherapyController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Store\StoreController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Approve\ApproveController;
use App\Http\Controllers\Admin\Report\ReportController;
use App\Http\Controllers\Admin\Post\PostController;


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

Route::get('/', function () {
    return view('admin.auth.login', ['title' => 'Login']);
})->name('login');
Route::post('login', [AuthController::class, "login"]);
Route::get('logout', [AuthController::class, "logout"]);
Route::get('register', [AuthController::class, "register"])->name('register');
Route::post('register', [AuthController::class, "createExpert"]);
Route::get('register-info', [AuthController::class, "registerInfo"])->name('register-info');
Route::post('register-info', [AuthController::class, "updateUserRegister"]);
Route::get('register-store', [AuthController::class, "registerStore"])->name('register-store');
Route::post('register-store', [AuthController::class, "createStore"]);

Route::get('vnpay-payment', [MainController::class, "vnpayPayment"]);
Route::get('vnpay-payment-error', [MainController::class, "vnpayPaymentError"])->name('payment-error');
Route::get('vnpay-payment-success', [MainController::class, "vnpayPaymentSuccess"])->name('payment-success');


Route::middleware(['auth:sanctum'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', [MainController::class, "index"])->name('admin');
        // Route::get('/chat', [MainController::class, "chat"])->name('chat');
        // Route::get('/messages', [MainController::class, "messages"])->name('messages');
        // Route::post('/messages', [MainController::class, "messageStore"])->name('messageStore');

        // group diseases
        Route::prefix('diseases')->group(function() {
            Route::get('add', [DiseaseController::class, "create"]);
            Route::post('add', [DiseaseController::class, "store"]);
            Route::get('list', [DiseaseController::class, "list"]);
            Route::get('edit/{disease}', [DiseaseController::class, "show"]);
            Route::put('edit/{disease}', [DiseaseController::class, "update"]);
            Route::delete('delete', [DiseaseController::class, "destroy"]);
        });

        // group therapies
        Route::prefix('therapies')->group(function() {
            Route::get('add', [TherapyController::class, "create"]);
            Route::post('add', [TherapyController::class, "store"]);
            Route::get('list', [TherapyController::class, "list"]);
            Route::get('edit/{therapy}', [TherapyController::class, "show"]);
            Route::put('edit/{therapy}', [TherapyController::class, "update"]);
            Route::delete('delete', [TherapyController::class, "destroy"]);
        });

        // group products
        Route::prefix('products')->group(function() {
            Route::get('add', [ProductController::class, "create"]);
            Route::post('add', [ProductController::class, "store"]);
            Route::get('list', [ProductController::class, "list"]);
            Route::get('edit/{product}', [ProductController::class, "show"]);
            Route::put('edit/{product}', [ProductController::class, "update"]);
            Route::delete('delete', [ProductController::class, "destroy"]);
        });

        // group users
        Route::prefix('users')->group(function() {
            Route::get('/', [UserController::class, "list"]);
            Route::get('/{id}', [UserController::class, "show"]);
            Route::put('/{id}', [UserController::class, "update"]);
            Route::delete('/{id}', [UserController::class, "destroy"]);
        });

        // list expert need actice
        Route::prefix('approves')->group(function() {
            Route::get('/', [ApproveController::class, "list"]);
            Route::get('/{id}', [ApproveController::class, "show"]);
            Route::put('/{id}', [ApproveController::class, "update"]);
            Route::delete('/{id}', [ApproveController::class, "destroy"]);
        });
    });

    Route::prefix('expert')->group(function() {
        Route::get('/', [MainController::class, "dashboard"])->name('expert');
        Route::get('/chat', [MainController::class, "chat"])->name('chat');
        Route::get('/messages', [MainController::class, "messages"])->name('messages');
        Route::post('/messages', [MainController::class, "messageStore"])->name('messageStore');

        
        // group stores 
        Route::prefix('stores')->group(function() {
            Route::get('/', [StoreController::class, "listProducts"]);
            Route::get('/import-product', [StoreController::class, "listProductImport"]);
            Route::post('/import-product', [StoreController::class, "importProductStore"]);
            Route::put('/update', [StoreController::class, "store"]);
            Route::get('/update', [StoreController::class, "detail"]);
            // Route::put('/{id}', [StoreController::class, "update"]); 
            Route::delete('/delete', [StoreController::class, "destroy"]);
            Route::get('/store-manager', [StoreController::class, "storeManager"]);
        });
        
        // group orders 
        Route::prefix('orders')->group(function() {
            Route::get('/update', [OrderController::class, "detail"]);
            Route::get('/add', [OrderController::class, "create"]);
            Route::get('/', [OrderController::class, "list"]);
            Route::get('/{id}', [OrderController::class, "show"]);
            Route::put('/update', [OrderController::class, "store"]);
            // Route::delete('/delete', [OrderController::class, "destroy"]);
        });

        // group reports 
        Route::prefix('reports')->group(function() {
            Route::get('/', [ReportController::class, "index"])->name('reports');
            Route::post('/', [ReportController::class, "getByDate"]);
        });

        // group posts 
        Route::prefix('posts')->group(function() {
            Route::get('/', [PostController::class, "index"])->name('posts');
            Route::get('/all-post', [PostController::class, "allPost"])->name('all-posts');
            Route::get('/{id}', [PostController::class, "detail"]);
            Route::post('add', [PostController::class, "create"]);
            Route::post('add', [PostController::class, "store"]);
        });
    });
    
});
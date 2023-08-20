<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\Auth\AuthController;
use App\Http\Controllers\Base\Disease\DiseaseController;
use App\Http\Controllers\Base\Therapy\TherapyController;
use App\Http\Controllers\Base\Product\ProductController;
use App\Http\Controllers\Base\User\UserController;
use App\Http\Controllers\Base\Chat\ChatController;
use App\Http\Controllers\Base\Store\StoreController;
use App\Http\Controllers\Base\Post\PostController;
use App\Http\Controllers\Base\File\FileController;
use App\Http\Controllers\Base\Comment\CommentController;
use App\Http\Controllers\Base\Diagnostic\DiagnosticController;
use App\Http\Controllers\Base\Cart\CartController;
use App\Http\Controllers\Base\Order\OrderController;
use App\Http\Controllers\Base\Address\AddressController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login',  'login');
    Route::post('register', 'register');
    Route::post('send-sms','sendSms');
    Route::post('verify', 'verify');
    Route::post('forgot-password', 'forgotPassword');
});

// Route::post('login', [AuthController::class, "login"]);
// Route::post('register', 'register');
// Route::get('send-sms', [AuthController::class, "sendSms"]);

//  Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function () {
//  });

Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('logout', [AuthController::class, "logout"]);

    Route::get('messages', [ChatController::class, "messages"]);
    Route::post('messages', [ChatController::class, "messageStore"]);

    // group diseases
    Route::prefix('diseases')->group(function() {
        Route::get('/by-name', [DiseaseController::class, "getDetailByName"]);
        
        Route::get('/', [DiseaseController::class, "list"]);
        Route::post('/', [DiseaseController::class, "store"]);
        Route::get('/{id}', [DiseaseController::class, "detail"]);
        Route::put('/{id}', [DiseaseController::class, "update"]);
        Route::delete('/{id}', [DiseaseController::class, "destroy"]);
    });

    // group therapies
    Route::prefix('therapies')->group(function() {
        Route::get('/', [TherapyController::class, "list"]);
        Route::post('/', [TherapyController::class, "store"]);
        Route::get('/{id}', [TherapyController::class, "detail"]);
        Route::put('/{id}', [TherapyController::class, "update"]);
        Route::delete('/{id}', [TherapyController::class, "destroy"]);
    });

    // group products
    Route::prefix('products')->group(function() {
        Route::get('/', [ProductController::class, "list"]);
        Route::post('/', [ProductController::class, "store"]);
        Route::get('/{id}', [ProductController::class, "detail"]);
        Route::put('/{id}', [ProductController::class, "update"]);
        Route::delete('/{id}', [ProductController::class, "destroy"]);
    });

    // group stores
    Route::prefix('stores')->group(function() {
        Route::get('/', [StoreController::class, "list"]);
    });

    // group posts
    Route::prefix('posts')->group(function() {
        Route::get('/', [PostController::class, "getList"]);
        Route::post('/', [PostController::class, "created"]);
        Route::get('/{id}', [PostController::class, "detail"]);
    });

    // group upload files
    Route::controller(FileController::class)->group(function () {
        Route::post('upload',  'uploadFile');
    });

    // group comments
    Route::controller(CommentController::class)->group(function () {
        Route::get('comments',  'getList');
        Route::post('comments',  'created');
    });

    // group diagnostics 
    Route::prefix('diagnostics')->group(function() {
        Route::get('/', [DiagnosticController::class, "getList"]);
        Route::post('/', [DiagnosticController::class, "created"]);
        Route::get('/{id}', [DiagnosticController::class, "detail"]);
    });

    // group orders 
    Route::prefix('orders')->group(function() {
        Route::post('/confirm', [OrderController::class, "confirm"]);
        Route::get('/shipping', [OrderController::class, "getShippingFee"]);
        Route::get('/', [OrderController::class, "getList"]);
        Route::post('/', [OrderController::class, "created"]);
        Route::get('/{id}', [OrderController::class, "detail"]);
        Route::delete('/{id}', [OrderController::class, "destroy"]);
    });

    // group carts 
    Route::prefix('carts')->group(function() {
        Route::get('/', [CartController::class, "getList"]);
        Route::post('/', [CartController::class, "created"]);
        Route::delete('/', [CartController::class, "destroy"]);
    });

    // group address
    Route::prefix('address')->group(function() {
        Route::get('/', [AddressController::class, "getList"]);
        Route::post('/', [AddressController::class, "created"]);
        Route::delete('/{id}', [AddressController::class, "delete"]);
    });

    // group users
    Route::prefix('users')->group(function() {
        Route::get('/', [UserController::class, "detail"]);
        Route::put('/', [UserController::class, "update"]);
    });

});

<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RefundController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::apiResource('/clients', ClientController::class);
    
    Route::apiResource('/categories', CategorieController::class);

    Route::apiResource('/books', BookController::class);

    Route::apiResource('/loans', LoanController::class);

    Route::get('/refunds', [RefundController::class, 'index']);

    Route::get('/refunds/{refundId}', [RefundController::class, 'show']);

    Route::post('/loans/{loanId}/refunds', [RefundController::class, 'store']);
});

Route::apiResource('/document-types', DocumentTypeController::class);

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\subCategoryController;
use App\Http\Controllers\Api\GlobalFieldController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login',[AuthController::class,'login'])->name('user.login');


Route::get('/userinfo', [AuthController::class,'getUserDetail'])->name('userDetails')->middleware(['auth:web']);





Route::get('/category', [CategoryController::class, 'index']);

Route::post('/categories', [CategoryController::class, 'store']);

Route::post('/categories/{id}', [CategoryController::class, 'update']);

Route::post('/category/delete', [CategoryController::class, 'destroy']);




Route::get('/subcategory', [SubCategoryController::class, 'index']);

Route::post('/subcategories/create', [SubCategoryController::class, 'store']);

Route::post('/subcategories/update', [SubCategoryController::class, 'update']);

Route::post('/subcategory/delete', [SubCategoryController::class, 'destroy']);



Route::get('/globalfileds', [GlobalFieldcontroller::class, 'index']);

Route::post('globalfield/store',[GlobalFieldController::class, 'store']);

Route::post('globalfield/update',[GlobalFieldController::class, 'update']);

Route::post('globalfield/delete',[GlobalFieldController::class, 'delete']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\UserController;
use App\Http\controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\controllers\SubCategoryController;
use App\Http\controllers\GlobalFieldController;
use App\Livewire\StoreCategories;

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
    return view('welcome');
});

Route::get('/Signin', [UserController::class, 'index'])->name('singin');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/dashboard', [UserController::class, 'view'])->name('dashbord')->middleware('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/admin/categories/create', [CategoryController::class, 'index'])->name('categories_create');

Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

Route::post('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/admin/categories/index', [CategoryController::class, 'index'])->name('categories.view');

Route::get('/export-categories', [CategoryController::class, 'exportCsv'])->name('exportCsv');


Route::get('/admin/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
Route::post('/admin/subcategories', [SubCategoryController::class, 'store'])->name('subcategories.store');

Route::post('/admin/subcategories/{id}', [SubCategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/admin/subcategories/{id}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');
Route::get('/export-subcategories', [SubCategoryController::class, 'exportCsv'])->name('subcategories.exportCsv');



Route::get('/admin/globalfields', [GlobalFieldController::class, 'index'])->name('globalfields_create');
Route::post('/admin/globalfields/create', [GlobalFieldController::class, 'store'])->name('globalfields.store');
Route::PUT('/admin/globalfields/{id}', [GlobalFieldController::class, 'update'])->name('globalfields.update');
Route::post('/admin/globalfields/delete/{id}', [GlobalFieldController::class, 'destroy'])->name('globalfields.destroy');

Route::post('/admin/globalfields/multidelete', [GlobalFieldController::class, 'multiDelete'])->name('globalfields.multidelete');

// Route::post('/admin/globalfields/mail', [GlobalFieldController::class, 'send'])->name('globalfields.sendmail');

Route::get('/admin/contactus', [ContactUsController::class, 'index'])->name('contactus.index');

Route::post('/admin/contactus/mail', [ContactUsController::class, 'send'])->name('contactus.sendmail');







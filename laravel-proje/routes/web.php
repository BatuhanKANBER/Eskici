<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CategoryImageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\UI\ContactController;
use App\Http\Controllers\UI\FaqsController;
use App\Http\Controllers\UI\HomeController;
use Illuminate\Support\Facades\Route;

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
//UI
Route::get('/', [HomeController::class, "index"]);
Route::get('/products-page', [\App\Http\Controllers\UI\ProductController::class, "index"]);
Route::get('/products-page/category/{categorySlug?}', [\App\Http\Controllers\UI\ProductController::class, "index"]);
Route::get('/contact-page', [ContactController::class, "index"]);
Route::get('/faqs-page', [FaqsController::class, "index"]);

//ADMIN
Route::resource('/users', UserController::class);

Route::get("/users/{user}/password-change", [UserController::class, "passwordForm"]);
Route::post("/users/{user}/password-change", [UserController::class, "passwordChange"]);

Route::resource("/users/{user}/addresses", AddressController::class);

Route::resource("/categories", CategoryController::class);

Route::resource("/products", ProductController::class);

Route::resource("/products/{product}/images", ProductImageController::class);

Route::resource("/categories/{category}/category_images", CategoryImageController::class);

Route::resource("/faqs", FaqController::class);

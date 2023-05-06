<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CategoryImageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\UI\AboutUsController;
use App\Http\Controllers\UI\CardController;
use App\Http\Controllers\UI\CheckOutController;
use App\Http\Controllers\UI\ContactController;
use App\Http\Controllers\UI\FaqsController;
use App\Http\Controllers\UI\HomeController;
use App\Http\Controllers\UI\AuthController;
use App\Http\Controllers\UI\PasswordController;
use App\Http\Controllers\UI\ProfileController;
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

Route::get("/login", [AuthController::class, "loginShow"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/register", [AuthController::class, "registerShow"]);
Route::post("/register", [AuthController::class, "register"]);
Route::get("/logout", [AuthController::class, "logout"]);

//UI
Route::get('/', [HomeController::class, "index"]);
Route::get('/products-page', [\App\Http\Controllers\UI\ProductController::class, "index"]);
Route::get('/products-page/category/{categorySlug?}', [\App\Http\Controllers\UI\ProductController::class, "index"]);
Route::get('/contact-page', [ContactController::class, "index"]);
Route::get('/faqs-page', [FaqsController::class, "index"]);
Route::get('/about-us', [AboutUsController::class, "index"]);
//AUTH:USER
Route::middleware(["auth", "role:user"])->group(function () {
    Route::get("/user/my-basket", [CardController::class, 'index']);
    Route::get("/user/my-basket/add/{product}", [CardController::class, 'add']);
    Route::get("/user/my-basket/remove/{cardDetails}", [CardController::class, 'remove']);
    Route::get("/user/profile", [ProfileController::class, 'index']);
    Route::get("/user/profile/{user}/edit", [ProfileController::class, 'edit']);
    Route::post("/user/profile/{user}", [ProfileController::class, 'update']);
    Route::get("/user/profile/{user}/password_change", [PasswordController::class, "index"]);
    Route::post("/user/profile/{user}/password_change", [PasswordController::class, "updatePassword"]);
    Route::get("/user/profile/{user}/address", [\App\Http\Controllers\UI\AddressController::class, "index"]);
    Route::get("/user/profile/{user}/address/{address}/edit", [\App\Http\Controllers\UI\AddressController::class, "edit"]);
    Route::post("/user/profile/{user}/address/{address}", [\App\Http\Controllers\UI\AddressController::class, "update"]);
    Route::delete("/user/profile/{user}/address/{address}", [\App\Http\Controllers\UI\AddressController::class, "destroy"]);
    Route::get("/user/profile/{user}/address/create", [\App\Http\Controllers\UI\AddressController::class, "create"]);
    Route::post("/user/profile/{user}/address", [\App\Http\Controllers\UI\AddressController::class, "store"]);
    Route::get("/user/credit_card", [CheckOutController::class, "index"]);
    Route::post("/user/credit_card", [CheckOutController::class, "checkOut"]);
    Route::get("/user/product_detail/{product}", [\App\Http\Controllers\UI\ProductController::class, "productDetails"]);
    Route::get("/user/my-orders", [ProfileController::class, "myOrders"]);
    Route::get("/user/order/{id}", [ProfileController::class, "orderView"]);
});

//ADMIN
Route::middleware(["auth", "role:admin"])->group(function () {
    Route::resource('/users', UserController::class);
    Route::get("/users/{user}/password-change", [UserController::class, "passwordForm"]);
    Route::post("/users/{user}/password-change", [UserController::class, "passwordChange"]);
    Route::resource("/users/{user}/address", AddressController::class);
    Route::resource("/categories", CategoryController::class);
    Route::resource("/products", ProductController::class);
    Route::resource("/products/{product}/images", ProductImageController::class);
    Route::resource("/categories/{category}/category_images", CategoryImageController::class);
    Route::resource("/faqs", FaqController::class);
    Route::get("/admin-in/profile", [\App\Http\Controllers\Admin\ProfileController::class, 'index']);
    Route::get("/admin-in/profile/{user}/edit", [\App\Http\Controllers\Admin\ProfileController::class, 'edit']);
    Route::post("/admin-in/profile/{user}", [\App\Http\Controllers\Admin\ProfileController::class, 'update']);
    Route::get("/admin-in/profile/{user}/password_change", [\App\Http\Controllers\Admin\PasswordController::class, 'index']);
    Route::post("/admin-in/profile/{user}/password_change", [\App\Http\Controllers\Admin\PasswordController::class, 'updatePassword']);
    Route::get("/admin/my-basket", [CardController::class, 'index']);
    Route::get("/admin/my-basket/add/{product}", [CardController::class, 'add']);
    Route::get("/admin/my-basket/remove/{cardDetails}", [CardController::class, 'remove']);
    Route::get("/admin/profile", [ProfileController::class, 'index']);
    Route::get("/admin/profile/{user}/edit", [ProfileController::class, 'edit']);
    Route::post("/admin/profile/{user}", [ProfileController::class, 'update']);
    Route::get("/admin/profile/{user}/password_change", [PasswordController::class, "index"]);
    Route::post("/admin/profile/{user}/password_change", [PasswordController::class, 'updatePassword']);
    Route::get("/admin/profile/{user}/address", [\App\Http\Controllers\UI\AddressController::class, "index"]);
    Route::get("/admin/profile/{user}/address/{address}/edit", [\App\Http\Controllers\UI\AddressController::class, "edit"]);
    Route::post("/admin/profile/{user}/address/{address}", [\App\Http\Controllers\UI\AddressController::class, "update"]);
    Route::delete("/admin/profile/{user}/address/{address}", [\App\Http\Controllers\UI\AddressController::class, "destroy"]);
    Route::get("/admin/profile/{user}/address/create", [\App\Http\Controllers\UI\AddressController::class, "create"]);
    Route::post("/admin/profile/{user}/address", [\App\Http\Controllers\UI\AddressController::class, "store"]);
    Route::get("/admin/credit_card", [CheckOutController::class, "index"]);
    Route::post("/admin/credit_card", [CheckOutController::class, "checkOut"]);
    Route::get("/admin/product_detail/{product}", [\App\Http\Controllers\UI\ProductController::class, "productDetails"]);
    Route::get("/admin/my-orders", [ProfileController::class, "myOrders"]);
    Route::get("/admin/order/{id}", [ProfileController::class, "orderView"]);
});

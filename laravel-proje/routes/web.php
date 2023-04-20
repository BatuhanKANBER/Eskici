<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return "ANA SAYFA";
});

Route::resource('users',UserController::class);

Route::get("/users/{user}/password-change",[UserController::class, "passwordForm"]);
Route::post("/users/{user}/password-change",[UserController::class, "passwordChange"]);

Route::resource("/users/{user}/addresses",AddressController::class);

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get("/", [PostController::class,"index"])->name("home");

Route::resource("profiles", ProfileController::class);

Route::resource("posts", PostController::class);

Route::controller(AuthController::class)->prefix("auth")->name("auth.")->group(function () {
    Route::middleware("guest")->group(function () {
        Route::get("/", 'index')->name("index");
        Route::post("login","login")->name("login");
    });
    Route::get("logout","logout")->name("logout")->middleware("auth");
});

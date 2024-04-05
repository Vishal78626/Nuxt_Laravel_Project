<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

Route::group(["middleware" => "auth:sanctum"], function () {
    Route::resource("user", UserController::class)->except(['create', 'edit']);
    Route::post("logout", [AuthController::class, "logout"]);
});

<?php

use App\Http\Controllers\AuthenController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenController::class)->group(function() {
    Route::get("/register", "register")->middleware("user-loggedin");
    Route::get("/login", "login")->middleware("user-loggedin");
    Route::post("/registration", "registerUser")->name("register-user");
    Route::post("/login-user", "loginUser")->name("login-user")->middleware("throttle:5,1");
    Route::get("/", "dashboard")->name("dashboard");
    Route::get("/logout", "logout");
});

// Route::controller(PostController::class)->group(function () {
//     Route::get("/create", "create");
//     Route::post("/create-post", "createPost")->name("posts-create");


// });

Route::resource("posts", PostController::class);



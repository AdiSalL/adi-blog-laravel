<?php

use App\Http\Controllers\AuthenController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenController::class)->group(function() {
    Route::get("/register", "register")->middleware("user-loggedin");
    Route::get("/login", "login")->middleware("user-loggedin");
    Route::post("/registration", "registerUser")->name("register-user");
    Route::post("/login-user", "loginUser")->name("login-user");
    Route::get("/", "dashboard")->name("dashboard");
    Route::get("/logout", "logout");
});

// Route::controller(PostController::class)->group(function () {
//     Route::get("/create", "create");
//     Route::post("/create-post", "createPost")->name("posts-create");


// });

Route::resource("posts", PostController::class);

Route::get("/posts/{id}/admin", [PostController::class, "admin"])->name("admin.panel");
Route::post("/posts/{id}/comments", [CommentController::class , "create"])->name("comments.store");
Route::put("/comments/{id}/approve", [CommentController::class, "approve"])->name("comments.approve");
Route::delete("/comments/{id}", [CommentController::class, "destroy"])->name("comments.destroy");




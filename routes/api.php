<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::post("register",[AuthController::class,"register"]);
Route::post("login",[AuthController::class,"login"]);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get("/notes",[NotesController::class,"index"]);
    Route::get("/notes/{id}",[NotesController::class,"show"]);
    Route::post("/notes",[NotesController::class,"store"]);
    Route::put("/notes/{id}",[NotesController::class,"update"]);
    Route::delete("/notes/{id}",[NotesController::class,"destroy"]);

});


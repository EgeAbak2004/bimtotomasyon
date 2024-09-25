<?php

use App\Http\Controllers\productController;
use App\Models\product;
use App\Models\warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/protected", function (Request $request) {
    return [warehouse::all(), "product"];
});

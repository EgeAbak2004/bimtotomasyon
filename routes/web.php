<?php

use App\Events\ProductCreate;
use App\Http\Controllers\AuthControllerA;
use App\Http\Controllers\productController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\Saleshistory;
use App\Http\Controllers\searchController;
use App\Http\Controllers\warehousecontroller;
use App\Models\sales;
use App\Models\warehouse;
use Illuminate\Support\Facades\Route;



Route::get("/", [productController::class, "index"])->name("home");

Route::get("/kayitol", function () {
    return view("Register");
})->name("registerview");

Route::get("/girisyap", function () {
    return view("login");
})->name("loginview");

Route::get("/product/add", function () {
    return view("add");
})->name("add");

Route::get("/sales", [SalesController::class, "index"])->name("sales");


Route::get("/warehouse", [warehousecontroller::class, "index"])->name("warehouse");

Route::post("/register", [AuthControllerA::class, "create"])->name("register");

Route::post("/login", [AuthControllerA::class, "login"])->name("login");


Route::post("/product/add/admin", [warehousecontroller::class, "Create"])->name("productadd");

Route::get("/warehouse/delete{id}", [warehousecontroller::class, "destroy"])->name("warehousedelete");

Route::post("/warehouse/update/{id}", [warehousecontroller::class, "update"])->name("warehouseupdate");

Route::match(["POST", "GET"], "/product/add/admin/e", [productController::class, "Create"]);

Route::post("/sales/create", [SalesController::class, "create"])->name("createsales");

Route::get("/saleshistory", [Saleshistory::class, "index"])->name("history");

Route::get("/sales/history/delete{id}", [Saleshistory::class, "destroy"])->name("historydelete");

Route::get("/sales/history/update/{id?}", [Saleshistory::class, "update"])->name("historyupdate");

Route::get("/search", [searchController::class, "index"])->name("search");


Route::get("/sea/{data?}", function () {
    return view("search");
})->name("se");


Route::get("/event", function () {
    event(new ProductCreate);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('products/categories', [ProductController::class, 'getCategories']);

Route::apiResource('products', ProductController::class);


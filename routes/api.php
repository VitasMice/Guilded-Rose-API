<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Available API endpoints to perform these actions:
 * Create category (POST)                           /api/category
 * Create item (POST)                               /api/item
 * Update item (PUT/PATCH)                          /api/item/{id}
 * Return all items based on category (GET)         /api/category-items/{category-id}
 * Delete all items based on category (DELETE)      /api/category-items/{category-id}
 */

// Create category
Route::post('/category');

// Create item
Route::post('/item');

// Update item
Route::put('/item/{id}');

// Return all items based on category
Route::get('/category-items/{id}');

// Delete all items based on category
Route::delete('/category-items/{id}');

Route::get('/category', function(){
    $Category = Category::create([
        'name' => 'item'
    ]);

    return $Category;
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

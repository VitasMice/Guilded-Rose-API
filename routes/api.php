<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Create category +
Route::post('/category', 'CategoryController@store');

// Create item +
Route::post('/item', 'ItemController@store');

// Update item +
Route::put('/item/{id}', 'ItemController@update');

// Return all items based on category +
Route::get('/category-items/{id}', 'CategoryController@show');

// Delete all items based on category
Route::delete('/category-items/{id}', 'CategoryController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

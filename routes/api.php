<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Santum
// Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('all-books', [App\Http\Controllers\BookController::class, 'index']);
    Route::post('add-book', [App\Http\Controllers\BookController::class, 'addBook']);
    Route::patch('update-book/{id}', [App\Http\Controllers\BookController::class, 'updateBook']);
    Route::delete('delete-book/{id}', [App\Http\Controllers\BookController::class, 'deleteBook']);

    Route::put('request-book/{id}', [App\Http\Controllers\BookController::class, 'requestBook']);
    Route::put('decline-book/{id}', [App\Http\Controllers\BookController::class, 'DeclineBook']);


// });

//Signin & Signup
Route::post('sign-up', [AuthController::class, 'register']);
Route::post('sign-in', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


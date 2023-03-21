<?php
use App\Http\Controllers\Admin\VideogameController;
use App\Http\Controllers\Api\VideogamesApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index', [VideogamesApiController::class, 'index']);
Route::get('/videogame/{id}', [VideogamesApiController::class, 'show']);
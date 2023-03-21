<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Admin\VideogameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [HomeController::class, "index"])->name("home");
Route::get('/', [HomeController::class, "index"])->name("home");


Route::middleware(["auth", "verified"])->name("admin.")->prefix("admin")->group(function(){
    Route::get("/videogames", [VideogameController::class,"index"])->name("videogames.index");
    Route::get("/videogames/create", [VideogameController::class,"create"])->name("videogames.create");
    Route::post("/videogames", [VideogameController::class,"store"])->name("videogames.store");
    Route::get("/videogames/{videogame}", [VideogameController::class,"show"])->name("videogames.show");
    Route::get("/videogames{videogame}/edit", [VideogameController::class,"edit"])->name("videogames.edit");
    Route::put("/videogames/{videogame}", [VideogameController::class,"update"])->name("videogames.update");
    Route::delete("/videogames/{videogame}", [VideogameController::class,"destroy"])->name("videogames.destroy");
});














Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\KategoriakController;
use App\Http\Controllers\ReceptekController;
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


Route::get('/receptekIndex', [ReceptekController::class, 'index']);
Route::post('/receptek/create', [ReceptekController::class, 'store']);
Route::get('/receptek/{id}', [ReceptekController::class, 'show']);
Route::get('/receptek', [ReceptekController::class, 'receptekLista']);
//Kategróriák
Route::get('/kategoriak', [KategoriakController::class, 'index']);
Route::post('/kategoriak/create', [KategoriakController::class, 'store']);
Route::get('/kategoriak/{id}', [KategoriakController::class, 'show']);

Route::get('/kategoriakList', [KategoriakController::class, 'kategoriakLista']);

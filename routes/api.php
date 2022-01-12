<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    PlaylistController
};

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->name('api.')->group(function(){
   Route::prefix('/playlists')->group(function(){

    Route::get('/',[PlaylistController::class, 'index'])->name('index_playlists');
    Route::get('/{id}',[PlaylistController::class,'show'])->name('single_playlists');
    Route::post('/',[PlaylistController::class, 'store'])->name('store.playlists');
    Route::put('/{id}', [PlaylistController::class, 'update'])->name('update.playlists');
    Route::delete('/{id}',[PlaylistController::class, 'delete'])->name('delete.playlists');
       
   });
});


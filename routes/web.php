<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('home');
// });

Route::prefix('/')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('postLogin', [AuthController::class, 'postLogin']);
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index']);
        Route::post('/create', [SiswaController::class, 'create']);
        Route::get('{id}/edit', [SiswaController::class, 'edit']);
        Route::post('{id}/update', [SiswaController::class, 'update']);
        Route::get('{id}/delete', [SiswaController::class, 'delete']);
    });
});


Route::get('test/maps', [SiswaController::class, 'Get_Address_From_Google_Maps']);

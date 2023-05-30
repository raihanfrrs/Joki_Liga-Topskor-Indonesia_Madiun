<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MasterController;

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

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function(){
        Route::get('login', 'index')->name('login');
        Route::post('login', 'proses');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(LayoutController::class)->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(LogoutController::class)->group(function () {
        Route::get('logout', 'index');
    });

    Route::group(['middleware' => ['cekUserLogin:admin']], function(){
        Route::controller(MasterController::class)->group(function () {
            Route::get('club', 'club_index');
            Route::get('/dataClubs', [MasterController::class, 'dataClubs'])->name('dataClubs');

            Route::get('player', 'player_index');
            Route::get('/dataPlayers', [MasterController::class, 'dataPlayers'])->name('dataPlayers');
        });

        Route::controller(ManagementController::class)->group(function () {
            Route::get('age', 'age_index');
            Route::get('/dataAgeGroups', [ManagementController::class, 'dataAgeGroups'])->name('dataAgeGroups');

            Route::get('zone', 'zone_index');
            Route::get('/dataZones', [ManagementController::class, 'dataZones'])->name('dataZones');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:user']], function(){

    });
});
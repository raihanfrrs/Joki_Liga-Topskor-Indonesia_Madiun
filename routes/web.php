<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RecycleController;

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

    Route::controller(RecycleController::class)->group(function () {
        Route::get('bin', 'index');
    });

    Route::group(['middleware' => ['cekUserLogin:admin']], function(){
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard/admin/totalClubs', 'totalClubs');
            Route::get('dashboard/admin/totalPlayers', 'totalPlayers');
            Route::get('dashboard/admin/totalAges', 'totalAges');
            Route::get('dashboard/admin/totalZones', 'totalZones');
            Route::get('dashboard/admin/totalTrashed', 'totalTrashed');
        });

        Route::controller(MasterController::class)->group(function () {
            Route::get('club', 'club_index');
            Route::get('/dataClubs', [MasterController::class, 'dataClubs'])->name('dataClubs');

            Route::get('player', 'player_index');
            Route::get('player/{player}/edit', 'player_edit');
            Route::get('/dataPlayers', [MasterController::class, 'dataPlayers'])->name('dataPlayers');
        });

        Route::controller(ManagementController::class)->group(function () {
            Route::get('age', 'age_index');
            Route::get('age/add', 'age_add');
            Route::post('age', 'age_store');
            Route::get('age/{age}/edit', 'age_edit');
            Route::put('age/{age}', 'age_update');
            Route::delete('age/{age}', 'age_destroy');
            Route::get('/dataAgeGroups', [ManagementController::class, 'dataAgeGroups'])->name('dataAgeGroups');

            Route::get('zone', 'zone_index');
            Route::get('zone/add', 'zone_add');
            Route::post('zone', 'zone_store');
            Route::get('zone/{zone}/edit', 'zone_edit');
            Route::put('zone/{zone}', 'zone_update');
            Route::delete('zone/{zone}', 'zone_destroy');
            Route::get('/dataZones', [ManagementController::class, 'dataZones'])->name('dataZones');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:user']], function(){

    });
});
<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProfileController;
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
        Route::get('bin/club/restore', 'club_restore');
        Route::get('bin/player/restore', 'player_restore');
        Route::get('bin/age/restore', 'age_restore');
        Route::get('bin/zone/restore', 'zone_restore');

        Route::get('bin/club/destroy', 'club_destroy');
        Route::get('bin/player/destroy', 'player_destroy');
        Route::get('bin/age/destroy', 'age_destroy');
        Route::get('bin/zone/destroy', 'zone_destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index');
        Route::put('profile/{user}', 'update');
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
            Route::get('club/add', 'club_add');
            Route::post('club', 'club_store');
            Route::get('club/{club}/edit', 'club_edit');
            Route::put('club/{club}', 'club_update');
            Route::get('club/{club}/details', 'club_show');
            Route::delete('club/{club}', 'club_destroy');
            Route::get('/dataClubs', [MasterController::class, 'dataClubs'])->name('dataClubs');

            Route::get('player', 'player_index');
            Route::get('player/{player}/edit', 'player_edit');
            Route::put('player/{player}', 'player_update');
            Route::get('player/status/update', 'player_status_update');
            Route::get('/player/age-group-data', 'player_read');
            Route::get('player/{player}/details', 'player_show');
            Route::delete('player/{player}', 'player_destroy');
            Route::get('/dataPlayers', [MasterController::class, 'dataPlayers'])->name('dataPlayers');

            Route::get('official', 'official_index');
            Route::get('official/{official}/edit', 'official_edit');
            Route::put('official/{official}', 'official_update');
            Route::get('official/status/update', 'official_status_update');
            Route::get('official/{official}/details', 'official_show');
            Route::get('/dataOfficials', [MasterController::class, 'dataOfficials'])->name('dataOfficials');
        });

        Route::controller(ManagementController::class)->group(function () {
            Route::get('age', 'age_index');
            Route::get('age/add', 'age_add');
            Route::post('age', 'age_store');
            Route::get('age/{age}/edit', 'age_edit');
            Route::put('age/{age}', 'age_update');
            Route::get('age/{age}/details', 'age_show');
            Route::delete('age/{age}', 'age_destroy');
            Route::get('/dataAgeGroups', [ManagementController::class, 'dataAgeGroups'])->name('dataAgeGroups');
        });
    });

    Route::group(['middleware' => ['cekUserLogin:user']], function(){

    });
});
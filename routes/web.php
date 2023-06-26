<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\PlayerController;
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
        Route::get('bin/official/restore', 'official_restore');
        Route::get('bin/age/restore', 'age_restore');
        Route::get('bin/mail/restore', 'mail_restore');

        Route::get('bin/club/destroy', 'club_destroy');
        Route::get('bin/player/destroy', 'player_destroy');
        Route::get('bin/official/destroy', 'official_destroy');
        Route::get('bin/age/destroy', 'age_destroy');
        Route::get('bin/mail/destroy', 'mail_destroy');
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
            Route::get('dashboard/admin/totalOfficials', 'totalOfficials');
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
            Route::get('player/{club}/all', 'player_all');
            Route::get('/dataPlayers', [MasterController::class, 'dataPlayers'])->name('dataPlayers');

            Route::get('official', 'official_index');
            Route::get('official/{official}/edit', 'official_edit');
            Route::put('official/{official}', 'official_update');
            Route::get('official/status/update', 'official_status_update');
            Route::get('official/{official}/details', 'official_show');
            Route::delete('official/{official}', 'official_destroy');
            Route::get('official/{club}/all', 'official_all');
            Route::get('/dataOfficials', [MasterController::class, 'dataOfficials'])->name('dataOfficials');

            Route::get('mail', 'mail_index');
            Route::get('mail/add', 'mail_add');
            Route::post('mail', 'mail_store');
            Route::get('mail/{mail}/edit', 'mail_edit');
            Route::put('mail/{mail}', 'mail_update');
            Route::get('mail/status/update', 'mail_status_update');
            Route::delete('mail/{mail}', 'mail_destroy');
            Route::get('mail/{mail}/details', 'mail_show');
            Route::get('mail/{mail}/download', 'mail_download');
            Route::get('/dataMails', [MasterController::class, 'dataMails'])->name('dataMails');
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
        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard/user/totalTrashedClub', 'totalTrashedClub');
            Route::get('dashboard/user/totalPlayers', 'totalPlayers');
            Route::get('dashboard/user/totalOfficials', 'totalOfficials');
            Route::get('dashboard/user/totalMails', 'totalMails');
            Route::get('dashboard/user/listMail', 'listMail');
        });

        Route::controller(ClubController::class)->group(function () {
            Route::get('club-data', 'index');
            Route::get('club-data/{club}/edit', 'edit');
            Route::put('club-data/{club}', 'update');
        });

        Route::controller(OfficialController::class)->group(function () {
            Route::get('official-data', 'index');
            Route::get('official-data/add', 'create');
            Route::post('official-data', 'store');
            Route::get('official-data/{official}/edit', 'edit');
            Route::put('official-data/{official}', 'update');
            Route::get('official-data/{official}/details', 'show');
            Route::delete('official-data/{official}', 'destroy');
            Route::get('/dataClubOfficials', [OfficialController::class, 'dataClubOfficials'])->name('dataClubOfficials');
        });

        Route::controller(PlayerController::class)->group(function () {
            Route::get('player-data', 'index');
            Route::get('player-data/add', 'create');
            Route::post('player-data', 'store');
            Route::get('player-data/{player}/edit', 'edit');
            Route::put('player-data/{player}', 'update');
            Route::get('player-data/{player}/details', 'show');
            Route::delete('player-data/{player}', 'destroy');
            Route::get('/dataClubPlayers', [PlayerController::class, 'dataClubPlayers'])->name('dataClubPlayers');
        });

        Route::controller(MailController::class)->group(function () {
            Route::get('mail-data/{mail}/download', 'download');
        });
    });
});
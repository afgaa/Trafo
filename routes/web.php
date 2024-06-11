<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home1Controller;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\DMCRController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrafoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DMCRAdminController;
use App\Http\Controllers\MonitoringAdminController;

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

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/', [App\Http\Controllers\Home1Controller::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\Home1Controller::class, 'index'])->name('home');
// Route::get('/arus', [App\Http\Controllers\ArusController::class, 'index'])->name('arus');
// Route::get('/suhu', [App\Http\Controllers\SuhuController::class, 'index'])->name('suhu');
// Route::get('/tekanan', [App\Http\Controllers\TekananController::class, 'index'])->name('tekanan');
// Route::get('/tegangan', [App\Http\Controllers\TeganganController::class, 'index'])->name('tegangan');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [Home1Controller::class, 'index'])->name('home');
    // Route::get('/home', [Home1Controller::class, 'index'])->name('home');

    // Route untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('trafo', TrafoController::class);
        Route::resource('user', UserController::class);
        // Route::get('/admin_monitoring', [MonitoringAdminController::class, 'index'])->name('admin_monitoring');
        Route::get('/admin_monitoring/{id_trafo}', [MonitoringAdminController::class, 'filter_trafo'])->name('admin_id_monitoring');
        // Route::get('/admin_dmcr', [DMCRAdminController::class, 'index'])->name('admin_dmcr');
        Route::get('/admin_dmcr/{id_trafo}', [DMCRAdminController::class, 'filter_trafo'])->name('admin_id_dmcr');
        Route::get('/arus/download', [MonitoringAdminController::class, 'export_arus'])->name('cetak_arus');
        Route::get('/suhu/download', [MonitoringAdminController::class, 'export_suhu'])->name('cetak_suhu');
        Route::get('/tekanan/download', [MonitoringAdminController::class, 'export_tekanan'])->name('cetak_tekanan');
        Route::get('/tegangan/download', [MonitoringAdminController::class, 'exportTegangan'])->name('cetak_tegangan');
        Route::post('/tegangan/store', [MonitoringAdminController::class, 'storeTegangan'])->name('store_tegangan');
    });

    // Route untuk user
    Route::middleware(['role:user'])->group(function () {
        Route::get('/home', [Home1Controller::class, 'index'])->name('home');
        // Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring');
        Route::get('/monitoring/{id_trafo}', [MonitoringController::class, 'filter_trafo'])->name('id_monitoring');
        // Route::get('/dmcr', [DMCRController::class, 'index'])->name('dmcr');
        Route::get('/dmcr/{id_trafo}', [DMCRController::class, 'filter_trafo'])->name('id_dmcr');
        
    });
});
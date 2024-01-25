<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemSetupController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ReportsController;

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

Route::get('/', [IndexController::class, 'index']);

Route::get('/dashboard', [IndexController::class, 'dashboard']);

Route::get('/overall-reports', [ReportsController::class, 'index']);

Route::get('/data-analytics', [ReportsController::class, 'dataAnalytics']);

Route::get('/genology', [IndexController::class, 'genology']);

Route::post('/setup', [SystemSetupController::class, 'systemSetup'])->name('systemSetup');

Route::post('/addmembers', [MembersController::class, 'addmembers'])->name('addmembers');


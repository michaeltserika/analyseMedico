<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\AnalyseController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('patients', PatientController::class);
    Route::get('/patients/export-pdf', [PatientController::class, 'exportPdf'])->name('patients.export');
    Route::resource('medecins', MedecinController::class);
    Route::resource('analyses', AnalyseController::class);
    Route::resource('resultats', ResultatController::class);
    Route::resource('factures', FactureController::class);

    Route::get('/stats', [StatsController::class, 'index'])->name('stats.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/patients/export-pdf', [PatientController::class, 'exportPdf'])->name('patients.export')->middleware('auth');
require __DIR__ . '/auth.php';

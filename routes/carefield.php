<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\Carefield\AuthorityController;
use App\Http\Controllers\Carefield\PatientController;
use App\Http\Controllers\Carefield\FormController;


Route::middleware(['auth', 'verified', AdminOnly::class])->group(function () {
    Route::get('/carefield', [AuthorityController::class, 'index'])->name('carefield.index');
    Route::get('/carefield/patients', [PatientController::class, 'index'])->name('carefield.patient');
    Route::get('/carefield/forms', [FormController::class, 'index'])->name('carefield.form');
    // Route::post('/carefield/register', [AuthorityController::class, 'registerPatient'])->name('carefield.registerPatient');
    // Route::get('/carefield/health-check/{id}', [AuthorityController::class, 'viewHealthCheck'])->name('carefield.viewHealthCheck');
    // Route::post('/carefield/update', [AuthorityController::class, 'updatePatientStatus'])->name('carefield.updatePatientStatus');
});


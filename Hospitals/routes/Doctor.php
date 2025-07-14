<?php

use App\Http\Controllers\Doctor\DiagnosticController;
use App\Http\Controllers\Doctor\HomeController;
use App\Http\Controllers\Doctor\InvoiceController;
use App\Http\Controllers\Doctor\LaboratorieController;
use App\Http\Controllers\Doctor\PatientDetailsController;
use App\Http\Controllers\Doctor\RayController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        //============================== Dasboard Doctor =================================
        Route::get('/dashboard/doctor', [HomeController::class,'index'])->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');

        //============================== End Dashboard Doctor =================================
        require __DIR__ . '/auth.php';

        Route::group(
            [
                'prefix' => 'doctor',
                'middleware' => ['auth:doctor']
            ],
            function () {

                // =========== Invoices ===========
                Route::controller(InvoiceController::class)->group(function () {

                    Route::resource('/invoices', InvoiceController::class);


                    Route::get('completed_invoices', 'completedInvoices')->name('completedInvoices');
                    Route::get('review_invoices', 'reviewInvoices')->name('reviewInvoices');
                });
                // =========== End Invoices ===========


                // =========== Diagnostics ===========
                Route::controller(DiagnosticController::class)->group(function () {


                    Route::resource('/Diagnostics', DiagnosticController::class);

                    Route::prefix('Diagnostics')->name('Diagnostics.')->group(function () {

                        Route::post('add_review', 'addReview')->name('add_review');
                    });
                });
                // =========== End Diagnostics ===========

                // =========== Rays ===========
                Route::controller(RayController::class)->group(function () {

                    Route::resource('/Rays', RayController::class);
                });
                // =========== End Rays ===========

                // =========== PatientDetails ===========
                Route::controller(PatientDetailsController::class)->group(function () {

                    Route::get('/patient-details/{id}', 'showDetails')->name('patientDetails');
                });
                // =========== End PatientDetails ===========

                // =========== PatientDetails ===========
                Route::controller(LaboratorieController::class)->group(function () {

                    Route::resource('/Laboratorie', LaboratorieController::class);
                });
                // =========== End PatientDetails ===========



            }
        );
    }
);

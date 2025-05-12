<?php

use App\Http\Controllers\Doctor\InvoiceController;
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
        Route::get('/dashboard/doctor', function () {
            return view('Dashboard.doctor-dashboard.dashboard');
        })->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');

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

                });
                // =========== End Invoices ===========


            }
        );
    }
);

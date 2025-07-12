<?php

use App\Http\Controllers\RayEmployee\HomeController;
use App\Http\Controllers\RayEmployee\InvoiceController;
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
       

         //============================== Dasboard ray-employee =================================
        Route::get('/dashboard/ray-employee', [HomeController::class,'index'])
        ->middleware(['auth:ray_employee', 'verified'])->name('dashboard.rayemployee');

        //============================== End Dashboard ray-employee =================================
        require __DIR__ . '/auth.php';

        Route::group(
            [
                'prefix' => 'ray-employee',
                'middleware' => ['auth:ray_employee']
            ],
            function () {

            Route::controller('invoices', InvoiceController::class)->group(
                function () {
                    Route::name('ray_employee.')->group(
                        function () {

                        Route::resource('invoices', InvoiceController::class );
                        Route::get('completed-invoices',[InvoiceController::class,'completedInvoices'])
                        ->name('completed_invoices');
                        }
                    );

                }
            );

            


            }
        );
    }
);

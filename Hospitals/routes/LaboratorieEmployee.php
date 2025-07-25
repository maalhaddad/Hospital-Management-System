<?php

use App\Http\Controllers\LaboratorieEmployees\HomeController;
use App\Providers\RouteServiceProvider;
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


         //============================== Dasboard laboratorie_employee =================================
        Route::get(RouteServiceProvider::LABORATORIEEMPLOYEE, [HomeController::class,'index'])
        ->middleware(['auth:laboratorie_employee', 'verified'])->name('dashboard.laboratorieEmployee');

        //============================== End Dashboard laboratorie_employee =================================
        require __DIR__ . '/auth.php';

        Route::group(
            [
                'prefix' => 'laboratorie-employee',
                'middleware' => ['auth:laboratorie_employee']
            ],
            function () {





            }
        );
    }
);

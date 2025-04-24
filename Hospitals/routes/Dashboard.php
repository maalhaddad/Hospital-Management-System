<?php

use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\SingleServiceController;
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

Route::get('Dashboard_admin', [DashboardController::class, 'index']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        //============================== Dasboard User =================================
        Route::get('/dashboard/User', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');

        //============================== End Dashboard User =================================

        //============================== Dasboard Admin =================================
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

        //============================== End Dashboard Admin =================================
        require __DIR__ . '/auth.php';

        //============================== Dashboard User =================================

        Route::group(
            [
                'prefix' => 'admin',
                'middleware' => ['auth:admin']
            ],
            function () {

                // =========== Section ===========

                Route::resource('/sections', SectionController::class);

                // =========== Doctor ===========

                Route::controller(DoctorController::class)->group(function () {

                    Route::resource('/doctors', DoctorController::class);


                    Route::prefix('doctors')->name('doctors.')->group(function () {

                        Route::post('update-status', 'updateStatus')->name('update-status');
                        Route::post('update-password', 'updatePassword')->name('update-password');
                    });
                });
                // =========== End Doctor ===========

                // ===========  Service ===========

                Route::controller(SingleServiceController::class)->group(function () {

                    Route::resource('services', SingleServiceController::class);
                });

                // =========== End Service ===========

                //========  GroupServices route =========

                Route::view('Add-GroupServices', 'livewire.GroupServices.include_create')->name('Add_GroupServices');

                //=========== end GroupServices route =========

                // ===========  Insurance ===========

                Route::controller(InsuranceController::class)->group(function () {

                    Route::resource('insurances', InsuranceController::class);
                });

                // =========== End Insurance ===========


                // ===========  Ambulances ===========

                Route::controller(AmbulanceController::class)->group(function () {

                    Route::resource('ambulances', AmbulanceController::class);
                });

                // =========== End Ambulances ===========


                // ===========  Patients ===========

                Route::controller(PatientController::class)->group(function () {

                    Route::resource('patients', PatientController::class);
                });

                // =========== End Patient ===========

            }
        );
    }
);

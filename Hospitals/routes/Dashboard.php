<?php

use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\LaboratorieEmployeeController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\RayEmployeeController;
use App\Livewire\CreateInvoice;
use App\Models\GroupInvoice;
use App\Models\SingleInvoices;
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
        Route::get('/dashboard/admin', [HomeController::class,'index'])
        ->middleware(['auth:admin', 'verified'])->name('dashboard.admin');

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


                //############################# single_invoices route ##########################################

                    Route::view('single_invoices','livewire.singleInvoices.index')->name('single_invoices');
                    Route::view('create-invoice','livewire.singleInvoices.index')->name('create-invoice');
                    Route::get('print-single-invoice/{id}',function($id){

                        $singleInvoice = SingleInvoices::find($id);
                        return view('livewire.singleInvoices.print',compact('singleInvoice'));

                    })->name('print-single-invoice');
                    Route::get('update-invoice/{invoice_id}',function($invoice_id){

                        return view('livewire.singleInvoices.index');
                    }
                    )->name('update-invoice');

               //############################# end single_invoices route ######################################

               // ===========  ReceiptAccount ===========

               Route::controller(ReceiptAccountController::class)->group(function () {

                Route::resource('Receipts', ReceiptAccountController::class);
            });

            // =========== End ReceiptAccount ===========

             // ===========  ReceiptAccount ===========

               Route::controller(PaymentAccountController::class)->group(function () {

                Route::resource('Payment', PaymentAccountController::class);
                Route::get('credit-balance/{patient_id}','gitCredit');
            });

            // =========== End ReceiptAccount ===========


             //############################# single_invoices route ##########################################

                    Route::view('group_invoices','livewire.groupInvoices.index')->name('group_invoices');
                    Route::view('create-group-invoice','livewire.groupInvoices.index')->name('create-group-invoice');
                    Route::get('print-group-invoice/{id}',function($id){

                        $groupInvoice = GroupInvoice::find($id);
                        return view('livewire.groupInvoices.print',compact('groupInvoice'));

                    })->name('print-group-invoice');

                    Route::get('update-group-invoice/{invoice_id}',function($invoice_id){

                        return view('livewire.groupInvoices.index');
                    }
                    )->name('update-group-invoice');

               //############################# end single_invoices route ######################################

              // ===========  RayEmployees ===========

               Route::controller(RayEmployeeController::class)->group(function () {

                Route::resource('ray-employees', RayEmployeeController::class);
            });

            // =========== End RayEmployees ===========


            // ===========  LaboratorieEmployee ===========

               Route::controller(LaboratorieEmployeeController::class)->group(function () {

                Route::resource('laboratorie-employees', LaboratorieEmployeeController::class);
            });

            // =========== End LaboratorieEmployee ===========

            }
        );
    }
);

<?php

use App\Http\Controllers\Patient\HomeController;
use App\Http\Controllers\Patient\PatientController;
use App\Livewire\Chat\CreateChat;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
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


         //============================== Dasboard Patient =================================
        Route::get(RouteServiceProvider::PATIENT, [HomeController::class,'index'])
        ->middleware(['auth:patient', 'verified'])->name('dashboard.patient');

        //============================== End Dashboard Patient =================================
        require __DIR__ . '/auth.php';

        Route::group(
            [
                'prefix' => 'patient',
                'middleware' => ['auth:patient'],
            ],
            function () {
                Route::name('patient.')->group(function(){

                    Route::get('invoices',[PatientController::class,'invoices'])->name('invoices');
                    Route::get('laboratories',[PatientController::class,'laboratories'])->name('laboratories');
                    Route::get('rays',[PatientController::class,'rays'])->name('rays');
                    Route::get('payments',[PatientController::class,'payments'])->name('payments');
                    Route::get('laboratorie-view/{laboratorieId}',[PatientController::class,'laboratoriesView'])->name('laboratorie.view');
                    Route::get('rays-view/{rayID}',[PatientController::class,'raysView'])->name('ray.view');
                    Route::get('list-doctors',[PatientController::class,'doctorsList'])->name('list.doctors');
                    Route::get('chat-pateint',[PatientController::class,'Chats'])->name('chat');
                    Route::get('icon',function(){

    return view('Dashboard.icons');
});

                });



            }
        );
    }
);

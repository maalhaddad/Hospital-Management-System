<?php

namespace App\Providers;

use App\Http\Controllers\RayEmployee\InvoiceController;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Interfaces\DoctorDashboard\Diagnostics\DiagnosticRepositoryInterface;
use App\Interfaces\DoctorDashboard\Invoices\InvoiceRepositoryInterface;
use App\Interfaces\DoctorDashboard\Laboratories\LaboratorieRepositoryInterface;
use App\Interfaces\DoctorDashboard\Rays\RayRepositoryInterface;
use App\Interfaces\sections\SectionRepositoryInterface;
use App\Repository\Sections\SectionRepository;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Interfaces\LaboratorieEmployees\LaboratorieEmployeeRepositoryInterface;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Insurances\InsuranceRepository;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Repository\Patients\PatientRepository;
use App\Repository\Services\SingleServiceRepository;
use App\Repository\ReceiptAccounts\ReceiptAccountRepository;
use App\Interfaces\ReceiptAccounts\ReceiptAccountRepositoryInterface;
use App\Interfaces\PaymentAccounts\PaymentAccountRepositoryInterface;
use App\Interfaces\RayEmployees\RayEmployeeRepositoryInterface;
use App\Interfaces\RayEmployeesDashboard\Invoices\InvoiceRepositoryInterface as RayInvoiceRepositoryInterface;
use App\Repository\DoctorDashboard\Diagnostics\DiagnosticRepository;
use App\Repository\PaymentAccounts\PaymentAccountRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\DoctorDashboard\Invoices\InvoiceRepository;
use App\Repository\DoctorDashboard\Laboratories\LaboratorieRepository;
use App\Repository\DoctorDashboard\Rays\RayRepository;
use App\Repository\LaboratorieEmployees\LaboratorieEmployeeRepository;
use App\Repository\RayEmployees\RayEmployeeRepository;
use App\Repository\RayEmployeesDashboard\Invoices\InvoiceRepository as RayInvoiceRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //========================== Admin ========================
       $this->app->bind(SectionRepositoryInterface::class , SectionRepository::class);
       $this->app->bind(DoctorRepositoryInterface::class , DoctorRepository::class);
       $this->app->bind(SingleServiceRepositoryInterface::class , SingleServiceRepository::class);
       $this->app->bind(InsuranceRepositoryInterface::class , InsuranceRepository::class);
       $this->app->bind(AmbulanceRepositoryInterface::class , AmbulanceRepository::class);
       $this->app->bind(PatientRepositoryInterface::class , PatientRepository::class);
       $this->app->bind(ReceiptAccountRepositoryInterface::class , ReceiptAccountRepository::class);
       $this->app->bind(PaymentAccountRepositoryInterface::class , PaymentAccountRepository::class);
       $this->app->bind(RayEmployeeRepositoryInterface::class , RayEmployeeRepository::class);
       $this->app->bind(LaboratorieEmployeeRepositoryInterface::class ,LaboratorieEmployeeRepository::class);


       //========================== Doctor ===========================
         $this->app->bind( InvoiceRepositoryInterface::class ,InvoiceRepository::class);
         $this->app->bind( DiagnosticRepositoryInterface::class ,DiagnosticRepository::class);
         $this->app->bind( RayRepositoryInterface::class ,RayRepository::class);
         $this->app->bind( LaboratorieRepositoryInterface::class ,LaboratorieRepository::class);


         //========================== Ray Employees ===========================
         $this->app->bind( RayInvoiceRepositoryInterface::class ,RayInvoiceRepository::class);
         
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

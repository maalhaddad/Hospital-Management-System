<?php

namespace App\Providers;

use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Interfaces\sections\SectionRepositoryInterface;
use App\Repository\Sections\SectionRepository;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Insurances\InsuranceRepository;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Repository\Patients\PatientRepository;
use App\Repository\Services\SingleServiceRepository;
use App\Repository\ReceiptAccounts\ReceiptAccountRepository;
use App\Interfaces\ReceiptAccounts\ReceiptAccountRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(SectionRepositoryInterface::class , SectionRepository::class);
       $this->app->bind(DoctorRepositoryInterface::class , DoctorRepository::class);
       $this->app->bind(SingleServiceRepositoryInterface::class , SingleServiceRepository::class);
       $this->app->bind(InsuranceRepositoryInterface::class , InsuranceRepository::class);
       $this->app->bind(AmbulanceRepositoryInterface::class , AmbulanceRepository::class);
       $this->app->bind(PatientRepositoryInterface::class , PatientRepository::class);
       $this->app->bind(ReceiptAccountRepositoryInterface::class , ReceiptAccountRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

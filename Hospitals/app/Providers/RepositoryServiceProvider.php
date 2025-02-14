<?php

namespace App\Providers;

use App\Interfaces\sections\SectionRepositoryInterface;
use App\Repository\Sections\SectionRepository;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Insurances\InsuranceRepository;
use App\Repository\Services\SingleServiceRepository;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

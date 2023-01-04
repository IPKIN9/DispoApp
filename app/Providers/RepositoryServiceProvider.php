<?php

namespace App\Providers;

use App\Interfaces\MahasiswaInterface;
use App\Interfaces\StaffInterface;
use App\Repositories\MahasiswaRepository;
use App\Repositories\StaffRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StaffInterface::class, StaffRepository::class);
        $this->app->bind(MahasiswaInterface::class, MahasiswaRepository::class);
    }
}

<?php

namespace App\Providers;

use App\Services\JobService;
use App\Repositories\JobRepository;
use App\Services\JobApplicationService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\JobApplicationRepository;
use App\Services\Interfaces\JobServiceInterface;
use App\Repositories\Interfaces\JobRepositoryInterface;
use App\Services\Interfaces\JobApplicationServiceInterface;
use App\Repositories\Interfaces\JobApplicationRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
        $this->app->bind(JobServiceInterface::class, JobService::class);

        $this->app->bind(JobApplicationServiceInterface::class, JobApplicationService::class);
        $this->app->bind(JobApplicationRepositoryInterface::class, JobApplicationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

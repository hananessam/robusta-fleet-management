<?php

namespace App\Providers;

use App\Repositories\Base\BaseInterface;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Seat\SeatInterface;
use App\Repositories\Seat\SeatRepository;
use App\Repositories\Trip\TripInterface;
use App\Repositories\Trip\TripRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(TripInterface::class, TripRepository::class);
        $this->app->bind(SeatInterface::class, SeatRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

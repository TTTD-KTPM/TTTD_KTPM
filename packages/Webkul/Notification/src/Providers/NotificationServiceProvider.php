<?php

namespace Webkul\Notification\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\Notification\Contracts\Notification as NotificationContract;
use Webkul\Notification\Repositories\NotificationRepository;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NotificationContract::class, function ($app) {
            return $app->make(NotificationRepository::class);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->app->register(EventServiceProvider::class);
    }
}

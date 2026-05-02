<?php

namespace Sazl\LaravelRepokit;

use Illuminate\Support\ServiceProvider;
use Sazl\LaravelRepokit\Commands\MakeRepositoryCommand;

class ServiceLayerProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/service.php', 'service');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/service.php' => config_path('service.php'),
            ], 'service-config');

            // Publish stubs
            $this->publishes([
                __DIR__ . '/../stubs' => resource_path('stubs/service'),
            ], 'service-stubs');

            $this->commands([
                MakeRepositoryCommand::class,
            ]);
        }

    }
}
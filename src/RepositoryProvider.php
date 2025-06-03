<?php

namespace Sazl\LaravelRepokit;

use Illuminate\Support\ServiceProvider;
use Sazl\LaravelRepokit\Commands\MakeRepositoryCommand;

class RepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/repository.php', 'repository');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/repository.php' => config_path('repository.php'),
            ], 'repository-config');

            // Publish stubs
            $this->publishes([
                __DIR__ . '/../stubs' => resource_path('stubs/repository'),
            ], 'repository-stubs');

            $this->commands([
                MakeRepositoryCommand::class,
            ]);
        }

    }
}
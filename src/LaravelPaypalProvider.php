<?php

namespace Pleets\LaravelPayPal;

use Illuminate\Support\ServiceProvider;

class LaravelPaypalProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadConfig();
        $this->loadViews();
    }

    private function loadConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/paypal/testing.php', 'paypal.testing');

        $this->publishes(
            [
                __DIR__ . '/../config/paypal' => config_path('paypal'),
            ],
            'laravel-paypal'
        );
    }

    private function loadViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-paypal');

        $this->publishes(
            [
                __DIR__ . '/../resources/views' => resource_path('views/vendor/laravel-paypal'),
                __DIR__ . '/../public/js' => public_path('js/paypal'),
            ],
            'laravel-paypal'
        );
    }
}

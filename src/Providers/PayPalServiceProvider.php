<?php

namespace Pleets\LaravelPayPal\Providers;

use Illuminate\Support\ServiceProvider;
use PaymentGateway\PayPalSdk\PayPalService;
use Pleets\LaravelPayPal\Helpers\Environment;

class PayPalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PayPalService::class, function () {
            $paypalService = new PayPalService(Environment::getEndpoint());
            $paypalService->setAuth(Environment::getClientId(), Environment::getSecret());

            if (Environment::isHandlerEnabled()) {
                $handler = Environment::getHandler();
                $paypalService->withHandler(new $handler());
            }

            return $paypalService;
        });
    }
}

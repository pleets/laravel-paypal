<?php

namespace Tests\Pleets\LaravelPayPal;

use Pleets\LaravelPayPal\Providers\PayPalServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [PayPalServiceProvider::class];
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->loadConfig();
    }

    private function loadConfig(): void
    {
        config()->set('paypal.api', include(__DIR__ . '/../config/paypal/api.php'));
        config()->set('paypal.checkout', include(__DIR__ . '/../config/paypal/checkout.php'));
        config()->set('paypal.subscription', include(__DIR__ . '/../config/paypal/subscription.php'));
    }
}

<?php

namespace Tests\Pleets\LaravelPayPal\Unit\Helpers;

use Pleets\LaravelPayPal\Helpers\Environment;
use Tests\Pleets\LaravelPayPal\Concerns\HasEnvironments;
use Tests\Pleets\LaravelPayPal\TestCase;

class EnvironmentTest extends TestCase
{
    use HasEnvironments;

    private const CONF_ENV_KEY = 'paypal.api.environment';

    /**
     * @test
     */
    public function itSetupsSandboxEnvironmentByDefault()
    {
        $this->assertTrue(Environment::isSandbox());
        $this->assertFalse(Environment::isLive());
        $this->assertSame(Environment::SANDBOX, config(self::CONF_ENV_KEY));
    }

    /**
     * @test
     */
    public function itSetupsLiveEnvironment()
    {
        app('config')->set(self::CONF_ENV_KEY, Environment::LIVE);

        $this->assertTrue(Environment::isLive());
        $this->assertFalse(Environment::isSandbox());
        $this->assertSame(Environment::LIVE, config(self::CONF_ENV_KEY));
    }

    /**
     * @test
     * @dataProvider environmentsProvider
     * @param string $environment
     */
    public function itGetsTheClientIdForTheCurrentEnvironment(string $environment)
    {
        app('config')->set(self::CONF_ENV_KEY, $environment);
        app('config')->set('paypal.api.' . $environment . '.credentials.client_id', uniqid());

        $this->assertSame(
            app('config')->get('paypal.api.' . $environment . '.credentials.client_id'),
            Environment::getClientId()
        );
    }

    /**
     * @test
     * @dataProvider environmentsProvider
     * @param string $environment
     */
    public function itGetsTheClientSecretForTheCurrentEnvironment(string $environment)
    {
        app('config')->set(self::CONF_ENV_KEY, $environment);
        app('config')->set('paypal.api.' . $environment . '.credentials.secret', uniqid());

        $this->assertSame(
            app('config')->get('paypal.api.' . $environment . '.credentials.secret'),
            Environment::getSecret()
        );
    }

    /**
     * @test
     * @dataProvider environmentsProvider
     * @param string $environment
     */
    public function itGetsTheEndpointForTheCurrentEnvironment(string $environment)
    {
        app('config')->set(self::CONF_ENV_KEY, $environment);
        app('config')->set('paypal.api.' . $environment . '.endpoint', 'http://example.com/' . uniqid());

        $this->assertSame(
            app('config')->get('paypal.api.' . $environment . '.endpoint'),
            Environment::getEndpoint()
        );
    }

    /**
     * @test
     */
    public function itReturnsTheActivationStateForCheckout()
    {
        $this->assertSame(config('paypal.checkout.activated'), Environment::isCheckoutActivated());
    }

    /**
     * @test
     */
    public function itReturnsTheActivationStateForSubscriptions()
    {
        $this->assertSame(config('paypal.subscription.activated'), Environment::areSubscriptionsActivated());
    }
}

<?php

namespace Pleets\LaravelPayPal\Helpers;

class Environment
{
    public const SANDBOX = 'sandbox';

    public const LIVE = 'live';

    public static function isSandbox(): bool
    {
        return self::getCurrentEnvironment() === self::SANDBOX;
    }

    public static function isLive()
    {
        return self::getCurrentEnvironment() === self::LIVE;
    }

    public static function getClientId()
    {
        return config('paypal.api.' . self::getCurrentEnvironment() . '.credentials.client_id');
    }

    public static function getSecret()
    {
        return config('paypal.api.' . self::getCurrentEnvironment() . '.credentials.secret');
    }

    public static function getEndpoint()
    {
        return config('paypal.api.' . self::getCurrentEnvironment() . '.endpoint');
    }

    public static function isCheckoutActivated(): bool
    {
        return config('paypal.checkout.activated');
    }

    public static function areSubscriptionsActivated(): bool
    {
        return config('paypal.subscription.activated');
    }

    private static function getCurrentEnvironment()
    {
        return config('paypal.api.environment');
    }
}

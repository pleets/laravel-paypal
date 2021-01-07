<?php

namespace Pleets\LaravelPayPal\Helpers;

class Environment
{
    public const SANDBOX = 'sandbox';
    public const LIVE = 'live';
    private const API_CONF = 'paypal.api';

    public static function isSandbox(): bool
    {
        return self::getCurrentEnvironment() === self::SANDBOX;
    }

    public static function isLive(): bool
    {
        return self::getCurrentEnvironment() === self::LIVE;
    }

    public static function getClientId()
    {
        return config(self::API_CONF . '.' . self::getCurrentEnvironment() . '.credentials.client_id');
    }

    public static function getSecret()
    {
        return config(self::API_CONF . '.' . self::getCurrentEnvironment() . '.credentials.secret');
    }

    public static function getEndpoint()
    {
        return config(self::API_CONF . '.' . self::getCurrentEnvironment() . '.endpoint');
    }

    public static function isHandlerEnabled(): bool
    {
        return config(self::API_CONF . '.handler.enabled');
    }

    public static function getHandler()
    {
        return config(self::API_CONF . '.handler.class');
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
        return config(self::API_CONF . '.environment');
    }
}

<?php

namespace Tests\Pleets\LaravelPayPal\Concerns;

use Pleets\LaravelPayPal\Helpers\Environment;

trait HasEnvironments
{
    public function environmentsProvider(): array
    {
        return [
            'Sandbox' => [Environment::SANDBOX],
            'Live' => [Environment::LIVE],
        ];
    }
}

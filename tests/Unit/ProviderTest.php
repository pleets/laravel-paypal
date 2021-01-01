<?php

namespace Tests\Pleets\LaravelPayPal\Unit;

use Pleets\LaravelPayPal\Providers\PayPalServiceProvider;
use Tests\Pleets\LaravelPayPal\TestCase;

class ProviderTest extends TestCase
{
    /**
     * @test
     */
    public function itRunsThePublishCommandSuccessfully()
    {
        $tags = [
            'laravel-paypal'
        ];

        array_walk($tags, function ($tag) {
            $r = $this->artisan('vendor:publish', [
                '--provider' => PayPalServiceProvider::class,
                '--tag' => $tag,
                '--force' => true,
            ]);
            $r->assertExitCode(0);
        });
    }
}

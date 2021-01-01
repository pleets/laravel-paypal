<p align="center"><img src="https://blog.pleets.org/img/articles/laravel-paypal-icon.png" height="80"></p>

<p align="center">
<a href="https://travis-ci.org/pleets/laravel-paypal"><img src="https://travis-ci.org/pleets/laravel-paypal.svg?branch=master" alt="Build Status"></a>
<a href="https://scrutinizer-ci.com/g/pleets/laravel-paypal"><img src="https://img.shields.io/scrutinizer/g/pleets/laravel-paypal.svg" alt="Code Quality"></a>
<a href="https://sonarcloud.io/dashboard?id=pleets_laravel-paypal"><img src="https://sonarcloud.io/api/project_badges/measure?project=pleets_laravel-paypal&metric=security_rating" alt="Bugs"></a>
<a href="https://scrutinizer-ci.com/g/pleets/laravel-paypal/?branch=master"><img src="https://scrutinizer-ci.com/g/pleets/laravel-paypal/badges/coverage.png?b=master" alt="Code Coverage"></a>
</p>

Laravel integrator for PayPal solutions. Actually this library supports the following solutions:

- [Checkout (Smart Payment Buttons)](#31-checkout-smart-payment-buttons)

## 1. Requirements

You need to make sure your server meets the following requirements.

- PHP >= 7.4
- Laravel 7.x, 8.x

## 2. Installation

Use following command to install this library:

```bash
composer require pleets/laravel-paypal
```

Add the service provider to your `providers[]` array in `config/app.php` file like: 

```php
\Pleets\LaravelPayPal\LaravelPaypalProvider::class
```

Finally, publish the vendor files.

```bash
php artisan vendor:publish --tag="laravel-paypal"
```

## 3. Usage

Set up first api credentials for sandbox with the following env vars.

```properties
PAYPAL_SANDBOX_CLIENT_ID=
PAYAL_SANDBOX_SECRET=
```

For live environment set up the following.

```properties
PAYPAL_LIVE_CLIENT_ID=
PAYAL_LIVE_SECRET=
```
Finally you can choose your current environment with the following.

```properties
PAYPAL_ENVIRONMENT=sandbox
```

## 3.1 Checkout

Activate paypal checkout with the following env var.

```properties
PAYPAL_CHECKOUT_ACTIVATED=true
```

Add the PayPal SDK to your blade templates as follows

```blade
@include('laravel-paypal::checkout.sdk')
```

Then add the Smart Payment Button like this

```blade
@include('laravel-paypal::checkout.button')
```

Finally, after the code of this button add the javascript code to handle it

```html
<script src="{{ asset('js/paypal/checkout.js') }}" defer></script>
```

The `checkout.js` file contains values related to the purchase amount and purchase behaviour.
For other values you can check the [official documentation](https://developer.paypal.com/docs/api/orders/v2#orders_create).

## 3.2 Subscriptions

Activate paypal subscriptions with the following en var.

```properties
PAYPAL_SUBSCRIPTION_ACTIVATED=true
```

You can interact with subscriptions Api through this [PayPal SDK](payment-gateways/paypal-sdk). Add the service provider
to your `providers[]` array in `config/app.php` file like:

```php
Pleets\LaravelPayPal\Providers\PayPalServiceProvider::class
```

Add the PayPal SDK to your blade templates as follows

```blade
@include('laravel-paypal::subscriptions.sdk')
```

Then add the Smart Payment Button like this

```blade
@include('laravel-paypal::subscriptions.button')
```

Finally, add the javascript code to handle this button below of it

```html
<script src="{{ asset('js/paypal/subscriptions.js') }}" defer></script>
```

The `subscriptions.js` file contains values related to creating subscriptions and purchase behaviour.
For other values you can check the [official documentation](https://developer.paypal.com/docs/subscriptions/integrate/#create-the-subscription).

<p align="center"><img src="https://blog.pleets.org/img/articles/laravel-paypal-icon.png" height="80"></p>

<p align="center">
<a href="https://travis-ci.org/pleets/laravel-paypal"><img src="https://travis-ci.org/pleets/laravel-paypal.svg?branch=master" alt="Build Status"></a>
<a href="https://scrutinizer-ci.com/g/pleets/laravel-paypal"><img src="https://img.shields.io/scrutinizer/g/pleets/laravel-paypal.svg" alt="Code Quality"></a>
<a href="https://sonarcloud.io/dashboard?id=pleets_laravel-paypal"><img src="https://sonarcloud.io/api/project_badges/measure?project=pleets_laravel-paypal&metric=security_rating" alt="Bugs"></a>
<a href="https://scrutinizer-ci.com/g/pleets/laravel-paypal/?branch=master"><img src="https://scrutinizer-ci.com/g/pleets/laravel-paypal/badges/coverage.png?b=master" alt="Code Coverage"></a>
</p>

Laravel integrator for PayPal solutions.

## 1. Requirements

You need to make sure your server meets the following requirements.

- PHP >= 7.4
- Laravel 8.x

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

Set up first api credentials with the following env vars.

```properties
PAYPAL_CLIENT_ID=
PAYPAL_SECRET=
```

## 3.1 Checkout (Smart Payment Buttons)

Activate paypal checkout with the following en var.

```properties
PAYPAL_CHECKOUT_ACTIVATED=true
```

Add the PayPal SDK to your blade template as follows

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

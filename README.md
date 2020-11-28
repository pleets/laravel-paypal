# Laravel PayPal

<p align="center"><img src="https://blog.pleets.org/img/articles/laravel-paypal-icon.png" height="80"></p>

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

Finally, after the code of this button add the javascript code to handle this button

```html
<script src="{{ asset('js/paypal/checkout.js') }}" defer></script>
```

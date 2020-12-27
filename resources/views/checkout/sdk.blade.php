<!-- PayPay checkout sdk -->
@if(\Pleets\LaravelPayPal\Helpers\Environment::activated())
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.api.credentials.client_id') }}"></script>
@endif

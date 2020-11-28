<!-- PayPay checkout sdk -->
@if(config('paypal.checkout.activated'))
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('paypal.api.credentials.client_id') }}"></script>
@endif

<!-- PayPay subscriptions sdk -->
@if(\Pleets\LaravelPayPal\Helpers\Environment::areSubscriptionsActivated())
    <script src="https://www.paypal.com/sdk/js?client-id={{ \Pleets\LaravelPayPal\Helpers\Environment::getClientId() }}&vault=true"></script>
@endif

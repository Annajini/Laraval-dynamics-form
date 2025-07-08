<form action="{{ route('pay') }}" method="POST" id="payment-form">
    @csrf
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-amount="10000"
        data-name="Test Ecommerce"
        data-description="Widget"
        data-currency="usd">
    </script>
</form>
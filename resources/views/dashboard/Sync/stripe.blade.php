<form action="step4" method="POST">
<button id="stripeButton" class="btn btn-lg btn-block btn-primary">Pay with Stripe</button>
</form>

<script src="https://checkout.stripe.com/checkout.js"></script>

<script>
var handler = StripeCheckout.configure({
    key: "pk_test_6pRNASCoBOKtIshFeQd4XMUh",
    image: "https://stripe.com/img/documentation/checkout/marketplace.png",
    // to this when a token is generated
    token: function(token) {
        // Use the token to create the charge with a server-side script.
        // You can access the token ID with `token.id`
        $form.append($('<input type="hidden" name="stripeToken" />').val(token.id));
        $form.append($('<input type="hidden" name="stripeEmail" />').val(token.email));

        // submit the form, uncomment to make this happen
        $form.get(0).submit();
    }
});

$('#stripeButton').on('click', function(e) {
// Open Checkout with further options
handler.open({
    name: "Data-Name",
    description: "Data-Description",
    currency: "USD",
    amount: "data_amount",
    @if(Session::has('email'))
        email: "email",
    @endif
    allowRememberMe: false,
});
    e.preventDefault();
});

// Close Checkout on page navigation
$(window).on('popstate', function() {
    handler.close();
});
</script>
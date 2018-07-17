{{--@extends('spark::layouts.app')--}}

{{--@section('scripts')--}}
    {{--@if (Spark::billsUsingStripe())--}}
        {{--<script src="https://js.stripe.com/v3/"></script>--}}
    {{--@else--}}
        {{--<script src="https://js.braintreegateway.com/v2/braintree.js"></script>--}}
    {{--@endif--}}
{{--@endsection--}}

@section('content')
<div class="wrapper">

    <!-- include left sidebar nav -->
    @include('dashboard.account-left-sidebar')

    <div class="main-panel">

        <!-- include top nav -->
        @include('dashboard.account-top-menu')

        <div class="content">

            <div class="container-fluid">
                <div class="row">

                    <!--buy-->
                    {{--<form action="../buy_points" method="post"  id="payment-form">--}}
                        {{--{{csrf_field()}}--}}
                        {{--@php--}}
                            {{--//var_dump(app(App\Http\Controllers\buyController::class)->views());--}}
                        {{--$email = DB::table("users")->where('id',Auth::id())->select('email')->first();--}}
                        {{--$myEmail;--}}
                        {{--foreach ($email as $value)--}}
                        {{--{--}}
                            {{--$myEmail = $value;--}}
                            {{--//var_dump($myEmail);--}}
                        {{--}--}}
                        {{--@endphp--}}
                        {{--<label>--}}
                        {{--<select name="boat_value" id="boat_value" required>--}}
                            {{--<option selected="selected" disabled>Choose boat size</option>--}}
                            {{--<option value="1000">$10</option>--}}
                            {{--<option value="2000">$20</option>--}}
                            {{--<option value="3000">$30</option>--}}
                        {{--</select>--}}
                        {{--</label>--}}
                        {{--<script--}}
                                {{--class="stripe-button"--}}
                                {{--src="https://checkout.stripe.com/checkout.js"--}}
                                {{--data-key="{{app(App\Http\Controllers\buyController::class)->views()}}"--}}
                                {{--data-amount=""--}}
                                {{--data-currency="usd"--}}
                                {{--data-name="aimee"--}}
                                {{--data-email="@php echo $myEmail @endphp"--}}
                                {{--data-image="https://stripe.com/img/documentation/checkout/marketplace.png"--}}
                                {{--data-locale="auto">--}}
                        {{--</script>--}}
                    {{--</form>--}}
                    {{--<script src="https://js.stripe.com/v2/"></script>--}}
                    {{--<script src="https://checkout.stripe.com/checkout.js"></script>--}}

                    {{csrf_field()}}
                    <script src="https://js.stripe.com/v3/"></script>
                    <form action="../buy_points" method="post"  id="payment-form">
                        <div class="group">
                            <label>
                                <span>Name</span>
                                <input name="cardholder-name" class="field" placeholder="Jane Doe" />
                            </label>
                            <label>
                                <span>Phone</span>
                                <input class="field" placeholder="(123) 456-7890" type="tel" />
                            </label>
                            <label>
                                <span>Type</span>
                                <select class="field" id="tests" style="padding-left: 35%;" onchange="myfuction()">
                                    <option value="1000">Starter $10</option>
                                    <option value="2000">Basic $20</option>
                                    <option value="3000">Pro $30</option>
                                    <option value="4000">Additional point</option>
                                </select>
                            </label>
                            <label id="label_points" style="display: none; " >
                                <span>Points</span>
                                <input onkeyup="justNumber()" placeholder="500" class="field" id="additionalPoint" />
                            </label>
                        </div>
                        <div class="group">
                            <label>
                                <span>Card</span>
                                <div id="card-element" class="field"></div>
                            </label>
                        </div>
                        <button type="submit" id="buy">Pay $10</button>
                        <div class="outcome">
                            <div class="error" role="alert"></div>
                            <div class="success">
                                Success! Your Stripe token is <span class="token"></span>
                            </div>
                        </div>
                    </form>

                    {{--<!-- Billing Tab Panes -->--}}
                    {{--@if (Spark::canBillCustomers())--}}
                        {{--@if (Spark::hasPaidPlans())--}}
                            {{--<!-- Subscription -->--}}
                            {{--<div role="tabpanel" class="tab-pane" id="subscription">--}}
                                {{--<div v-if="user">--}}
                                    {{--@include('spark::settings.subscription')--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        {{--<!-- Payment Method -->--}}
                        {{--<div role="tabpanel" class="tab-pane" id="payment-method">--}}
                            {{--<div v-if="user">--}}
                                {{--@include('spark::settings.payment-method')--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--@endif--}}

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="/home">Aimee</a>
                </p>
            </div>
        </footer>

    </div>
</div>

<script>
    var stripe = Stripe('{{app(App\Http\Controllers\buyController::class)->views()}}');
    var elements = stripe.elements();

    var card = elements.create('card', {
        style: {
            base: {
                iconColor: '#666EE8',
                color: '#31325F',
                lineHeight: '40px',
                fontWeight: 300,
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSize: '15px',

                '::placeholder': {
                    color: '#CFD7E0',
                },
            },
        }
    });
    card.mount('#card-element');

    function setOutcome(result) {
        var successElement = document.querySelector('.success');
        var errorElement = document.querySelector('.error');
        successElement.classList.remove('visible');
        errorElement.classList.remove('visible');

        if (result.token) {
            // Use the token to create a charge or a customer
            // https://stripe.com/docs/charges
            successElement.querySelector('.token').textContent = result.token.id;
            successElement.classList.add('visible');
            // post('../buy_points/', {stripeToken: result.token.id, _token: $('meta[name="csrf-token"]').attr('content')});

            var _token_ = result.token.id;
            var price = $('#buy').text().split('$')[1];
            var boat_value = $("#tests").val();

             $.ajax({
                url: '/buy_points',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                },
                dataType: 'text',
                data: {stripeToken:_token_ , price: price, boat_value:boat_value}
            })
                .done(function(data) {
                    console.log("success");
                    document.location.href = "billing";
                })
                .fail(function(data, request, error) {
                    console.log(error);
                })
                .success(function(data) {
                    console.log(data);
                })
                .always(function(data) {
                    console.log("complete");
                })



        } else if (result.error) {
            errorElement.textContent = result.error.message;
            errorElement.classList.add('visible');
        }
    }

    card.on('change', function(event) {
        setOutcome(event);
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        var form = document.querySelector('form');
        var extraDetails = {
            name: form.querySelector('input[name=cardholder-name]').value
        };
        stripe.createToken(card, extraDetails).then(setOutcome);
    });

    function myfuction() {
        var sel = document.getElementById("tests");
        var val = sel.options[sel.selectedIndex].value;
        if(val == 1000){
            document.getElementById('buy').textContent = "Pay $10";
            document.getElementById('label_points').style.display = "none";
        }
        if(val == 2000){
            document.getElementById('buy').textContent = "Pay $20";
            document.getElementById('label_points').style.display = "none";
        }
        if(val == 3000){
            document.getElementById('buy').textContent = "Pay $30";
            document.getElementById('label_points').style.display = "none";
        }
        if(val == 4000){
            document.getElementById('label_points').style.display = "block";
            document.getElementById('label_points').style.left = "0px";
        }
    }

    function justNumber() {
        var input = document.getElementById("additionalPoint");
        input.value = input.value.replace(/[^\d,]/g, '');
        document.getElementById('buy').textContent = "Pay " + "$" +($("#additionalPoint").val())/2;
    }

    function post(path, params, method) {
        method = "post"; // Set method to post by default if not specified.

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            if(params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }

</script>


    <style>

        * {
            font-family: "Helvetica Neue", Helvetica;
            font-size: 15px;
            font-variant: normal;
            padding: 0;
            margin: 0;
        }


        form {
            width: 480px;
            margin: 20px auto;
        }

        .group {
            background: white;
            box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
            0 3px 6px 0 rgba(0,0,0,0.08);
            border-radius: 4px;
            margin-bottom: 20px;
        }

        label {
            position: relative;
            color: #8898AA;
            font-weight: 300;
            height: 40px;
            line-height: 40px;
            margin-left: 20px;
            display: block;
        }

        .group label:not(:last-child) {
            border-bottom: 1px solid #F0F5FA;
        }

        label > span {
            width: 20%;
            text-align: right;
            float: left;
        }

        .field {
            background: transparent;
            font-weight: 300;
            border: 0;
            color: #31325F;
            outline: none;
            padding-right: 10px;
            padding-left: 10px;
            cursor: text;
            width: 70%;
            height: 40px;
            float: right;
        }

        .field::-webkit-input-placeholder { color: #CFD7E0; }
        .field::-moz-placeholder { color: #CFD7E0; }
        .field:-ms-input-placeholder { color: #CFD7E0; }

        button {
            float: left;
            display: block;
            background: #666EE8;
            color: white;
            box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
            0 3px 6px 0 rgba(0,0,0,0.08);
            border-radius: 4px;
            border: 0;
            margin-top: 20px;
            font-size: 15px;
            font-weight: 400;
            width: 100%;
            height: 40px;
            line-height: 38px;
            outline: none;
        }

        button:focus {
            background: #555ABF;
        }

        button:active {
            background: #43458B;
        }

        .outcome {
            float: left;
            width: 100%;
            padding-top: 8px;
            min-height: 24px;
            text-align: center;
        }

        .success, .error {
            display: none;
            font-size: 13px;
        }

        .success.visible, .error.visible {
            display: inline;
        }

        .error {
            color: #E4584C;
        }

        .success {
            color: #666EE8;
        }

        .success .token {
            font-weight: 500;
            font-size: 13px;
        }
    </style>

@endsection
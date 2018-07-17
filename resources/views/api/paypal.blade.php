@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h2><i style="color: #1B4A7D" class="fa fa-paypal"></i> PayPal  </h2>
        </div>

        <h3>Sample Payment</h3>

        <div>
            <p>Redirects to PayPal and allows authorizing the sample payment.</p>
            <a href="https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&amp;token=EC-2AJ301489F161603E">
                <button class="btn btn-primary">Authorize payment</button>
            </a>
        </div>
    </div>
@stop
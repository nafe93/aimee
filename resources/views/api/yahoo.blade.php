@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h2><i style="color: #7b0099" class="fa fa-yahoo"></i>Yahoo  </h2>
        </div>

        <p class="lead">Relevant Stocks</p>

        <div class="alert alert-info">
            <p>It is currently<strong> {{ $data['item']['condition']['temp'] }}</strong> degrees in<strong> New York, NY</strong>.</p>
        </div>

    </div>
@stop
@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h3><i style="color: #335397" class="fa fa-facebook-square"></i> Facebook  </h3>
        </div>

        <h3><i class="fa fa-user"></i> My Profile</h3>

        <img src="{{ $details['picture']['url'] }}" width="90" height="90" class="thumbnail">
        <h4>{{ $details['name'] }} </h4>
        <h6>First Name: {{ $details['first_name'] }}</h6>
        <h6>Last Name: {{ $details['last_name'] }}</h6>
        <h6>Gender: {{ $details['gender'] }}</h6>
        <h6>Link: {{ $details['link'] }}</h6>
        <h6>Email: {{ $details['email'] }} </h6>

        <br>
    </div>
@stop
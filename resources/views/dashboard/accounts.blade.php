@extends('spark::layouts.app')

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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Social Media Accounts</h4>
                                <p class="category">Click on a provider to enable or disable automation.</p>
                            </div>
                            <div class="content all-icons">
                                <div class="row">
                                    {{--<div class="col-sm-4">--}}
                                        {{--<a href="{{route('api.github')}}" style="color: #fff">--}}
                                            {{--@if (Auth::user()->providers()->where('provider', 'github')->exists())--}}
                                                {{--<div style="background-color: #000" class="panel panel-default">--}}
                                                    {{--<div class="panel-body">--}}
                                                        {{--<img src="http://i.imgur.com/2AaBlpf.png" height="32"> GitHub--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div style="background-color: #000" class="panel panel-default">--}}
                                                    {{--<div class="panel-body" style="height: 60px; color: #000000;">--}}
                                                        {{--GitHub--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    <div class="col-sm-4">
                                        <a href="{{route('api.twitter')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'twitter')->exists())
                                                <div style="background-color: #00abf0" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/EYA2FO1.png" height="32"> Twitter
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        Twitter
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{route('api.facebook')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'facebook')->exists())
                                                <div style="background-color: #3b5998" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/jiztYCH.png" height="32"> Facebook
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        Facebook
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{route('api.foursquare')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'foursquare')->exists())
                                                <div style="background-color: #1cafec" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/PixH9li.png" height="32"> Foursquare
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        Foursquare
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="{{route('api.lastfm')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'lastfm')->exists())
                                                <div style="background-color: #d21309" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/KfZY876.png" height="32"> Last.fm
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        Last.fm
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{route('api.linkedin')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'linkedin')->exists());
                                                <div style="background-color: #007bb6" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/sYmVWAw.png" height="32"> LinkedIn
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        LinkedIn
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{route('api.nyt')}}" style="color: #fff">
                                            <div style="background-color: #454442" class="panel panel-default">
                                                <div class="panel-body">
                                                    <img src="http://i.imgur.com/e3sjmYj.png" height="32"> New York Times
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    {{--<div class="col-sm-4">--}}
                                        {{--<a href="{{route('api.steam')}}" style="color: #fff">--}}
                                            {{--@if (Auth::user()->providers()->where('provider', 'steam')->exists())--}}
                                                {{--<div style="background-color: #000" class="panel panel-default">--}}
                                                    {{--<div class="panel-body">--}}
                                                        {{--<img src="http://i.imgur.com/1xGmKBX.jpg" height="32"> Steam--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div style="background-color: #ededed" class="panel panel-default">--}}
                                                    {{--<div class="panel-body" style="height: 60px; color: #000000;">--}}
                                                        {{--Steam--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<a href="{{route('api.stripe')}}" style="color: #fff">--}}
                                            {{--@if (Auth::user()->providers()->where('provider', 'stripe')->exists())--}}
                                                {{--<div style="background-color: #3da8e5" class="panel panel-default">--}}
                                                    {{--<div class="panel-body">--}}
                                                        {{--<img src="http://i.imgur.com/w3s2RvW.png" height="32"> Stripe--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div style="background-color: #ededed" class="panel panel-default">--}}
                                                    {{--<div class="panel-body" style="height: 60px; color: #000000;">--}}
                                                        {{--Stripe--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<a href="{{route('api.paypal')}}" style="color: #000">--}}
                                            {{--@if (Auth::user()->providers()->where('provider', 'paypal')->exists())--}}
                                                {{--<div style="background-color: #f5f5f5" class="panel panel-default">--}}
                                                    {{--<div class="panel-body">--}}
                                                        {{--<img src="http://i.imgur.com/JNc0iaX.png" height="32"> PayPal--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div style="background-color: #ededed" class="panel panel-default">--}}
                                                    {{--<div class="panel-body" style="height: 60px; color: #000000;">--}}
                                                        {{--PayPal--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="{{route('api.twilio')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'twilio')->exists())
                                                <div style="background-color: #fd0404" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/mEUd6zM.png" height="32"> Twilio
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        Twilio
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{route('api.tumblr')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'tumblr')->exists())
                                                <div style="background-color: #304e6c" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/rZGQShS.png" height="32"> Tumblr
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        Tumblr
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    {{--<div class="col-sm-4">--}}
                                        {{--<a href="{{route('api.scraping')}}" style="color: #fff">--}}
                                            {{--<div style="background-color: #ff6500" class="panel panel-default">--}}
                                                {{--<div class="panel-body">--}}
                                                    {{--<img src="http://i.imgur.com/RGCVvyR.png" height="32"> Web Scraping--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    <div class="col-sm-4">
                                        <a href="{{route('api.yahoo')}}" style="color: #fff">
                                            <div style="background-color: #3d048b" class="panel panel-default">
                                                <div class="panel-body">
                                                    <img src="http://i.imgur.com/Cl6WJAu.png" height="32"> Yahoo
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="{{route('api.clockwork')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'clockwork')->exists())
                                                <div style="background-color: #000" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/YcdxZ5F.png" height="32"> Clockwork SMS
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        Clockwork SMS
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    {{--<div class="col-sm-4">--}}
                                        {{--<a href="{{route('api.aviary')}}" style="color: #fff">--}}
                                            {{--@if (Auth::user()->providers()->where('provider', 'aviary')->exists())--}}
                                                {{--<div style="background: linear-gradient(to bottom, #1f3d95 0%,#04aade 100%)" class="panel panel-default">--}}
                                                    {{--<div class="panel-body">--}}
                                                        {{--<img src="http://i.imgur.com/npBRwMI.png" height="32"> Aviary--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div style="background: #ededed" class="panel panel-default">--}}
                                                    {{--<div class="panel-body" style="height: 60px; color: #000000;">--}}
                                                        {{--Aviary--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<a href="{{route('api.lob')}}" style="color: #fff">--}}
                                            {{--@if (Auth::user()->providers()->where('provider', 'lob')->exists())--}}
                                                {{--<div style="background-color: #176992" class="panel panel-default">--}}
                                                    {{--<div class="panel-body">--}}
                                                        {{--<img src="http://i.imgur.com/bmgfsSg.png" height="32"> Lob--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div style="background-color: #176992" class="panel panel-default">--}}
                                                    {{--<div class="panel-body" style="height: 60px; color: #000000;">--}}
                                                        {{--Lob--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                     {{--<div class="col-sm-4">--}}
                                        {{--<a href="{{route('api.bitgo')}}" style="color: #fff">--}}
                                            {{--@if (Auth::user()->providers()->where('provider', 'bitgo')->exists())--}}
                                                {{--<div style="background-color: #142834" class="panel panel-default">--}}
                                                    {{--<div class="panel-body">--}}
                                                        {{--<img src="http://i.imgur.com/v753soI.png" height="32"> BitGo--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@else--}}
                                                {{--<div style="background-color: #ededed" class="panel panel-default">--}}
                                                    {{--<div class="panel-body" style="height: 60px; color: #000000;">--}}
                                                        {{--BitGo--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    <div class="col-sm-4">
                                        <a href="{{route('api.quandl')}}" style="color: #000">
                                            <div style="background-color: #ffffff" class="panel panel-default">
                                                <div class="panel-body">
                                                    <img src="/img/quandl.jpg" height="32"> Quandl
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="{{route('api.slack')}}" style="color: #fff">
                                            @if (Auth::user()->providers()->where('provider', 'slack')->exists())
                                                <div style="background-color: #4d394b" class="panel panel-default">
                                                    <div class="panel-body">
                                                        <img src="http://i.imgur.com/fbNYOzm.png" height="32"> Slack
                                                    </div>
                                                </div>
                                            @else
                                                <div style="background-color: #ededed" class="panel panel-default">
                                                    <div class="panel-body" style="height: 60px; color: #000000;">
                                                        Slack
                                                    </div>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

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
@endsection
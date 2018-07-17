@extends('spark::layouts.app')

@section('content')

    {{-- Money --}}
    @if(@$moneyEnd)
        {{-- <h2>Out of money</h2> --}}
    @else
        {{-- <h2>Has money</h2> --}}
    @endif

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
                        <!-- Strategy content here -->
                        <div class="panel panel-default">
                            <div class="panel-heading">ِAnalytics</div>

                            <div class="panel-body">
                                <!-- Some text -->
                                <ul class="nav nav-tabs" id="myTabEvents">
                                    <li class="active"><a class="tabnav btn btn-block btn-social btn-twitter" data-toggle="tab" href="#AnalyticsPanel1"><span class="fa fa-user"></span>Twitter Simple Analytics</a></li>
                                    <li><a class="tabnav btn btn-block btn-social btn-linkedin" data-toggle="tab" href="#AnalyticsPanel2"><span class="fa fa-user"></span>Twitter Item Analytics</a></li>
                                    <li><a class="tabnav btn btn-block btn-social btn-linkedin" data-toggle="tab" href="#AnalyticsPanel3"><span class="fa fa-user"></span>Twitter Crossbred Analytics</a></li>
                                </ul>

                                <div class="tab-content" id="myTabContent">

                                <!-- Panel 1 -->
                                @include('dashboard.Analytics.TwitterSimpleAnalytics')
                                <!-- Panel 2 -->
                                @include('dashboard.Analytics.TwitterItemAnalytics')
                                <!-- Panel 3 -->
                                @include('dashboard.Analytics.TwitterhybridAnalytics')

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
                    &copy; 2018 <a href="/home">Aimee</a>
                </p>
            </div>
        </footer>

        {{-- <script type="text/javascript" src="js/rss.js"></script>'; --}}


    </div>
</div>

@endsection
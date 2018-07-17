@extends('spark::layouts.app')

@section('content')
<div class="wrapper">

    <!-- include left sidebar nav -->
    @include('dashboard.account-left-sidebar')

    <div class="main-panel">

        <!-- include top nav -->
        @include('dashboard.account-top-menu')

        <div id="map"></div>
        <script>
            $().ready(function(){
                demo.initGoogleMaps();
            });
        </script>

    </div>
</div>
@endsection
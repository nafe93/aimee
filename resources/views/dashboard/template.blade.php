@extends('spark::layouts.app')

@section('content')
<div class="container">

    <!-- include left sidebar nav -->
    @include('dashboard.account-left-sidebar')

    <div class="main-panel">

        <!-- include top nav -->
        @include('dashboard.account-top-menu')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('api')
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
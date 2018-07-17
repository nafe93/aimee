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
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Dashboard</div>

                            <div class="panel-body">
                                Welcome to Aimee. Link an <a href="/accounts">account</a> to get started.
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

            <script type="text/javascript">
                $(document).ready(function(){

                    demo.initChartist();

                    /*$.notify({
                        icon: 'pe-7s-gift',
                        message: "Welcome to <b>Aimee</b>"

                    },{
                        type: 'info',
                        timer: 4000
                    });*/

                });
            </script>

        </footer>

    </div>
</div>
@endsection
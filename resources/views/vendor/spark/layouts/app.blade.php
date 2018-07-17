<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', trans('layouts/app.title'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <!--Menu select-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-select.css">

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

    <link href="/css/jquery.steps.css" rel="stylesheet">
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <link href="/css/main.css" rel="stylesheet">

    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/css/dashboard.css" rel="stylesheet"/>

    <link href="/css/extras.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in production -->
{{--<link href="/css/demo.css" rel="stylesheet" />--}}

<!--     Fonts and icons     -->
    <link href="/css/pe-icon-7-stroke.min.css" rel="stylesheet" />
    <link href="/css/ekko-lightbox.min.css" rel="stylesheet" />
    <link href="/css/custom_styles.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- <script src="/js/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <script src="/js/jquery.min.js"></script>

    <!-- Synchronization script -->
    <script src="/js/sync.js"></script>
    <script type="text/javascript" src="/js/rss.js"></script>
    <script type="text/javascript" src="/js/action.js"></script>
    <script type="text/javascript" src="/js/ekko-lightbox.min.js"></script>
    <script type="text/javascript" src="/js/support.js"></script>

    <!-- Scripts -->
@yield('scripts', '')

<!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
                Spark::scriptVariables(), []
        )); ?>
    </script>
    
</head>
<body v-cloak>
<div id="spark-app">

<!-- Main Content -->
@yield('content')

<!-- Application Level Modals -->
@if (Auth::check())
    @include('spark::modals.notifications')
    @include('spark::modals.support')
    @include('spark::modals.session-expired')
@endif

<!-- JavaScript -->

    <script src="/js/notify.min.js"></script>
    <script src="/js/demo.js"></script>
    <script src="/js/moment-with-locales.min.js"></script>

    <script src="/js/select2/select2.min.js"></script>
    <script src="/js/select2/i18n/en.js"></script>


    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>



    <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="/js/jquery.steps.min.js"></script>

    <script src="/js/sweetalert.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="/js/bootstrap-switch.min.js"></script>

    <!--Select -->
    <script src="/js/bootstrap-select.js"></script>

    <!--  Charts Plugin -->
    <script src="/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="/js/bootstrap-notify.js"></script>

    <!--  Momemnt Plugin    -->
    <script src="/js/moment.js"></script>

    <!--  Datepicker Plugin    -->
    <script src="/js/bootstrap-datetimepicker.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="/js/dashboard.js"></script>


    <script src="/js/app.js"></script>
    <!-- Light Bootstrap Table DEMO methods, don't include it in production -->
    {{--<script src="/js/demo.js"></script>--}}
    <script src="/js/tooltip.js"></script>
    <script src="/js/actionsList.js"></script>

    @yield('footer')
</div>
</body>
</html>

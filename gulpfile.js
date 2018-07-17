var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less')
       .browserify('app.js', null, null, { paths: 'vendor/laravel/spark/resources/assets/js' })
        .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')
        .copy('node_modules/sweetalert/dist/sweetalert.css', 'public/css/sweetalert.css')

        .copy('bower_components/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
        .copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
        .copy('bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css', 'public/css/bootstrap-switch.min.css')
        .copy('bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js', 'public/js/bootstrap-switch.min.js')
        .copy('bower_components/bootstrap-notify/css/bootstrap-notify.css', 'public/css/bootstrap-notify.css')
        .copy('bower_components/bootstrap-notify/js/bootstrap-notify.js', 'public/js/bootstrap-notify.js')
        .copy('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js', 'public/js/bootstrap-select.min.js')
        .copy('bower_components/bootstrap-select/dist/css/bootstrap-select.min.css', 'public/css/bootstrap-select.min.css')
        .copy('bower_components/chartist/dist/chartist.css', 'public/js/chartist.css')
        .copy('bower_components/chartist/dist/chartist.min.js', 'public/js/chartist.min.js')
        .copy('bower_components/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
        .copy('bower_components/pixeden-stroke-7-icon/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css', 'public/css/pe-icon-7-stroke.min.css')
        .copy('bower_components/animate.css/animate.min.css', 'public/css/animate.min.css')
        .copy('resources/assets/js/dashboard.js', 'public/js/dashboard.js')
        .copy('resources/assets/css/dashboard.css', 'public/css/dashboard.css')
        .copy('resources/assets/js/demo.js', 'public/js/demo.js')
        .copy('resources/assets/css/extras.css', 'public/css/extras.css')

        .copy('resources/assets/js/landing-page.js', 'public/js/landing-page.js')
        .copy('resources/assets/css/landing-page.css', 'public/css/landing-page.css')
});

@extends('spark::layouts.app')

@section('content')
<style>
    .vertical-center {
        min-height: 100%;
        min-height: 100vh;

        display: flex;
        align-items: center;
    }
</style>
<div class="vertical-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('auth/login.login') }}</div>

                    <div class="panel-body">
                        @include('spark::shared.errors')

                        <form class="form-horizontal" role="form" method="POST" action="/login">
                            {{ csrf_field() }}

                            <!-- E-Mail Address -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('auth/login.email-address') }}</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('auth/login.password') }}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <!-- Remember Me -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div>
                                        <label>
                                            <input type="checkbox" name="remember"> {{ trans('auth/login.remember-me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Login Button -->
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        <i class="fa m-r-xs fa-sign-in"></i>{{ trans('auth/login.login') }}
                                    </button>

                                    <a class="btn btn-block btn-primary" href="{{ url('/password/reset') }}">{{ trans('auth/login.forgot-your-password?') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-facebook btn-social"><i class="fa fa-facebook"></i>Sign in with Facebook</a>
                <a href="{{ url('/auth/twitter') }}" class="btn btn-block btn-twitter btn-social"><i class="fa fa-twitter"></i>Sign in with Twitter</a>
                <a href="{{ url('/auth/google') }}" class="btn btn-block btn-google btn-social"><i class="fa fa-google-plus"></i>Sign in with Google</a>
                <a href="{{ url('/auth/linkedin') }}" class="btn btn-block btn-linkedin btn-social"><i class="fa fa-linkedin"></i>Sign in with LinkedIn</a>

            </div>
        </div>
    </div>
</div>
@endsection

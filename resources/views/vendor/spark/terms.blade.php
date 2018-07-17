@extends('spark::layouts.app')

@section('content')
<div class="container">
    <!-- Application Dashboard -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('terms.terms-of-service') }}</div>

                <div class="panel-body terms-of-service">
                    {!! $terms !!}
                </div>
            </div>
        </div>
    </div>
@endsection

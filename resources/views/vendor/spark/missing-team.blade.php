@extends('spark::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
                <div class="panel-heading">{{ trans('missing-team.wheres-your-team') }}</div>

                <div class="panel-body">
                    {{ trans('missing-team.looks-like-not-team') }}
                    <a href="/settings#/teams">{{trans('missing-team.settings')}}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

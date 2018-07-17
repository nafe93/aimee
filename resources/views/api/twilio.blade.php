@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h2><i style="color: #f00" class="fa fa-phone"></i>Twilio  </h2>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <form role="form" method="POST" action="{{ route('api.twilio') }}">
                   {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                        <label class="control-label">Number to text</label>
                        <input type="text" name="number" autofocus="" class="form-control" placeholder="e.g +2347089740924">
                        @if ($errors->has('number'))
                            <span class="help-block">{{ $errors->first('number') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label class="control-label">Message</label>
                        <input type="text" name="message" class="form-control">
                        @if ($errors->has('message'))
                            <span class="help-block">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-location-arrow"></i> Send
                    </button>
                </form>
            </div>
        </div>

    </div>
@stop
@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h2><i class="fa fa-phone"></i> Clockwork SMS  </h2>
        </div>

        <h4>Send a text message</h4>

        <div class="row">
            <div class="col-sm-6">
                <form role="form" method="POST" action="{{ route('api.clockwork') }}">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <input type="text" name="telephone" placeholder="Phone Number (international format)" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-success">Send</button>
                            </span>
                        </div>
                        @if ($errors->has('telephone'))
                            <span class="help-block">{{ $errors->first('telephone') }}</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <br>
    </div>
@stop
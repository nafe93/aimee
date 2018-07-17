@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h3><i class="fa fa-building-o"></i> Quandl  </h3>
        </div>

        <h3> Monitoring </h3>

        @if ($data)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Symbol</th>
                        <th class="hidden-xs">Activity</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($data as $info)
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
@stop
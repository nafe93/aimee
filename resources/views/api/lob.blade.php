@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h2><i class="fa fa-envelope"></i> Lob  </h2>
        </div>

        <h3>Delivery routes in 10007</h3>

         @if ($routes)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Route</th>
                        <th># of Residential Addresses</th>
                        <th># of Business Addresses</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($routes as $route)
                    <tr>
                        <td>{{ $route['route'] }}</td>
                        <td>{{ $route['residential'] }}</td>
                        <td>{{ $route['business'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <br>
    </div>
@stop
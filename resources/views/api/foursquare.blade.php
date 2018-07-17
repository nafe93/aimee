@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h3><i style="color: #335397" class="fa fa-foursquare-square"></i> Foursquare  </h3>
        </div>

        <h3><i class="fa fa-user"></i> List Of Venues Near You</h3>

        @if ($venues)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Geopoints</th>
                    </tr>
                </thead>
                <tbody>

                <?php $kar = 1; ?>
                @foreach ($venues as $venue)
                    <tr>
                        <td>{{ $kar }}</td>
                        <td>{{ $venue['name'] }}</td>
                        <td>{{ $venue['location']['lat'] . ',' . $venue['location']['lng'] }}</td>
                    </tr>
                <?php $kar++ ?>
                @endforeach
                </tbody>
            </table>
        @endif


        <br>
    </div>
@stop
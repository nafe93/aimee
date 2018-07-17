@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h3><i class="fa fa-building-o"></i> New York Times  </h3>
        </div>

        <h3> Top Stories </h3>

        @if ($data)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th class="hidden-xs">Description</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($data as $info)
                    <tr>
                        <td>{{ $info['title'] }}</td>
                        <td>{{ $info['abstract'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
@stop
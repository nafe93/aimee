@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h2><i style="color: #ff6600" class="fa fa-hacker-news"></i> Web Scraping</h2>
        </div>

        <h3>Hacker News Frontpage</h3>

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                <?php $kar = 1; ?>
                @foreach ($links as $link)
                    <tr>
                        <td>{{ $kar }}</td>
                        <td><a href="https://news.ycombinator.com/" target="_blank">{{ $link[0] }}</a></td>
                    </tr>
                <?php $kar++ ?>
                @endforeach
            </tbody>
        </table>



    </div>
@stop
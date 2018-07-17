@extends('dashboard.template')

@section('api')
    <div class="main-container">
        @include('layouts.partials.alerts')

        <div class="page-header">
            <h3><i class="fa fa-tumblr-square"></i> Tumblr  </h3>
        </div>

        <h3><i class="fa fa-user"></i> Posts on Taylor Swift Tumblr</h3>

        @if ($posts)
            <ul class="media-list">
                @foreach($posts as $post)
                    <li class="media">
                        <div class="media-body">
                            <strong class="media-heading"><a href="{{ $post->post_url }}">{{ $post->slug }}</strong>
                            <span class="text-muted"> {{ $post->caption }}</span>
                            <span class="text-muted"> {{ $post->date }}</span>
                            <p>{{ $post->summary }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
       @endif
        <br>
    </div>
@stop
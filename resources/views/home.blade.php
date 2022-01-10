@extends('layout')

@section('title', 'Home')

@section('content')

    @if(count($artists))
        <ul id="artists-list">
        @foreach($artists as $artist)
            <li>
                <div class="card">
                    <img class="card-img-top" src="{{ asset($artist->picture) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artist->name }}</h5>
                        <p class="card-text"><strong>twitter:</strong> <a href="https://twitter.com/{{ $artist->twitter }}" target="_blank">{{ $artist->twitter }}</p>
                        <a href="{{ route('artist.albums', $artist->id) }}" class="btn btn-primary btn-sm">@lang('home.see_albums')</a>
                        <a href="{{ route('albums.createPage', $artist->id) }}" class="btn btn-info btn-sm">@lang('home.create_album')</a>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    @endif

@endsection
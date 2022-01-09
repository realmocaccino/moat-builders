@extends('layout')

@section('title', 'Home')

@section('content')

    <h2>@lang('home.artists')</h2>
    @if(count($artists))
        <ul>
        @foreach($artists as $artist)
            <li>
                <img src="{{ asset('storage/artists/' . str_replace('@', '', strtolower($artist[0]['twitter']))) }}.jpeg">
                <h3>{{ $artist[0]['name'] }}</h3>
                <p><strong>twitter:</strong> {{ $artist[0]['twitter'] }}</p>
                <p><a href="{{ route('artist.albums', $artist[0]['id']) }}">@lang('home.see_albums')</a> | <a href="{{ route('albums.createPage', $artist[0]['id']) }}">@lang('home.create_album')</a></p>
            </li>
        @endforeach
        </ul>
    @endif

@endsection
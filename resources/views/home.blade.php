@extends('layout')

@section('title', 'Home')

@section('content')

    <h2>@lang('home.artists')</h2>
    @if(count($artists))
        <ul>
        @foreach($artists as $artist)
            <li>
                <h3>{{ $artist[0]['name'] }}</h3>
                <p><strong>twitter:</strong> {{ $artist[0]['twitter'] }}</p>
            </li>
        @endforeach
        </ul>
    @endif

@endsection
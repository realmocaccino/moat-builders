@extends('layout')

@section('title', 'Home')

@section('content')

    <h1>Artists</h1>
    @if(count($artists))
        <ul>
        @foreach($artists as $artist)
            <li>
                <h2>{{ $artist[0]['name'] }}</h2>
                <p><strong>twitter:</strong> {{ $artist[0]['twitter'] }}</p>
            </li>
        @endforeach
        </ul>
    @endif

@endsection
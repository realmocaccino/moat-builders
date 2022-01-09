@extends('layout')

@section('title', 'Create Album')

@section('content')

    <h2>@lang('album/index.title')</h2>
    @if(count($albums))
        <ul>
            @foreach($albums as $album)
                <li>
                    <p>@lang('album/index.name'): {{ $album->name }}</p>
                    <p>@lang('album/index.year'): {{ $album->year }}</p>
                    <p><a href="{{ route('albums.editPage', $album->id) }}">@lang('album/index.edit_album')</a></p>
                </li>
            @endforeach
        </ul>
    @else
        @lang('album/index.no_albums_yet')
    @endif
    <p><a href="{{ route('albums.createPage', $artistId) }}">@lang('home.create_album')</a></p>
    
@endsection
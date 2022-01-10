@extends('layout')

@section('title', 'Create Album')

@section('content')

    <div class="container">
        <h2>@lang('album/index.title')</h2>
        @if(count($albums))
            <ul>
                @foreach($albums as $album)
                    <li>
                        <p>@lang('album/index.name'): {{ $album->name }}</p>
                        <p>@lang('album/index.artist'): {{ $album->artistName }}</p>
                        <p>@lang('album/index.year'): {{ $album->year }}</p>
                        <p><a href="{{ route('albums.editPage', $album->id) }}">@lang('album/index.edit')</a> @if(auth()->user()->isAdmin()) | <a href="{{ route('albums.deletePage', $album->id) }}">@lang('album/index.delete')</a> @endif</p>
                    </li>
                @endforeach
            </ul>
        @else
            @lang('album/index.no_albums_yet')
        @endif
        <p><a href="{{ route('albums.createPage', $artistId ?? null) }}">@lang('home.create_album')</a></p>
    </div>
    
@endsection
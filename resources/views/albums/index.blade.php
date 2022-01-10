@extends('layout')

@section('title', 'Albums')

@section('content')

    @if(isset($artist))
        <div id="album-artist-card">
            <img id="album-artist-card-image" src="{{ asset($artist->picture) }}">
            <div id="album-artist-card-data">
                <h5 class="card-title">{{ $artist->name }}</h5>
                <p class="card-text"><i class="bi bi-twitter"></i> <a href="https://twitter.com/{{ $artist->twitter }}" target="_blank">{{ $artist->twitter }}</a></p>
            </div>
        </div>
    @endif
    @if(count($albums))
        <ul id="albums-list">
        @foreach($albums as $album)
            <li>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <p class="card-text">
                            <strong>@lang('album/index.artist'):</strong> {{ $album->artistName }}<br>
                            <strong>@lang('album/index.year'):</strong> {{ $album->year }}
                        </p>
                        <a href="{{ route('albums.editPage', $album->id) }}" class="btn btn-sm btn-primary">@lang('album/index.edit')</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('albums.deletePage', $album->id) }}" class="btn btn-sm btn-danger">@lang('album/index.delete')</a>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    @else
        <div class="container">
            <p>@lang('album/index.no_albums_yet')</p>
            <p><a href="{{ route('albums.createPage', $artistId ?? null) }}">@lang('home.create_album')</a></p>
        </div>
    @endif
    
@endsection
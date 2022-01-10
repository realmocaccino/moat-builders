@extends('layout')

@section('title', 'Create Album')

@section('content')

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
        <p>@lang('album/index.no_albums_yet')</p>
        <p><a href="{{ route('albums.createPage', $artistId ?? null) }}">@lang('home.create_album')</a></p>
    @endif
    
@endsection
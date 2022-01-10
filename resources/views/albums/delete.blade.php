@extends('layout')

@section('title', 'Edit Album')

@section('content')

    <div class="container">
        <h2>@lang('album/delete.title')</h2>
        <form id="album-delete-form" method="post" action="{{ route('albums.delete', $album->id) }}">
            <div class="form-group">
            	<p>@lang('album/delete.message') {{ $album->name }} ({{ $album->year }})?</p>
            </div>
            <div class="form-group">
                <button id="album-delete-form-submit" type="submit" class="btn btn-danger">@lang('album/delete.submit')</button>
                <a id="album-delete-form-cancel" href="{{ route('albums.index', $album->artistId) }}" class="btn btn-text">@lang('album/delete.cancel')</button>
            </div>
            {{ method_field('delete') }}
            {!! csrf_field() !!}
        </form>
    </div>
    
@endsection
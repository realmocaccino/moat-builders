@extends('layouts.private')

@section('title', 'Create Album')

@section('content')

    <div class="container">
        <h2>@lang('album/create.title')</h2>
        <form id="album-create-form" method="post" action="{{ route('albums.create') }}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            	<label for="album-create-form-name">@lang('album/create.name'):</label>
                <input id="album-create-form-name" name="name" type="text" value="{{ old('name') }}" class="form-control">
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('artist_id') ? ' has-error' : '' }}">
            	<label for="album-create-form-artistId">@lang('album/create.artist')</label>
                <select id="album-create-form-artistId" name="artist_id" class="form-control">
                    @foreach($artists as $artist)
                        <option value="{{ $artist->id }}" @if(old('artist_id', $artistId) == $artist->id)) selected @endif>{{ $artist->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('artist_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('artist_id') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
            	<label for="album-create-form-year">@lang('album/create.year'):</label>
                <input id="album-create-form-year" name="year" type="text" value="{{ old('year') }}" class="form-control">
                @if($errors->has('year'))
                    <span class="help-block">
                        <strong>{{ $errors->first('year') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <button id="album-create-form-submit" type="submit" class="btn btn-primary">@lang('album/create.submit')</button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
    
@endsection
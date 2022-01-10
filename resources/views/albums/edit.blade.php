@extends('layout')

@section('title', 'Edit Album')

@section('content')

    <div class="container">
        <h2>@lang('album/edit.title')</h2>
        <form id="album-edit-form" method="post" action="{{ route('albums.edit', $album->id) }}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            	<label for="album-edit-form-name">@lang('album/edit.name'):</label>
                <input id="album-edit-form-name" name="name" type="text" value="{{ old('name', $album->name) }}" class="form-control">
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div><div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
            	<label for="album-edit-form-year">@lang('album/edit.year'):</label>
                <input id="album-edit-form-year" name="year" type="text" value="{{ old('year', $album->year) }}" class="form-control">
                @if($errors->has('year'))
                    <span class="help-block">
                        <strong>{{ $errors->first('year') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <button id="album-edit-form-submit" type="submit" class="btn btn-block btn-primary">@lang('album/edit.submit')</button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
    
@endsection
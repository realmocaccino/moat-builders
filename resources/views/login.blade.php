@extends('layout')

@section('title', 'Login')

@section('content')

    <div class="container">
        @if($errors->has('failed-login'))
            <div class="alert alert-warning">{{ $errors->first('failed-login') }}</div>
        @endif
        <form id="login-form" method="post" action="{{ route('login.authenticate') }}">
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            	<label for="login-form-username">@lang('login.username')</label>
                <input id="login-form-username" name="username" type="text" value="{{ old('username') }}" class="form-control">
                @if($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            	<label for="login-form-password">@lang('login.password')</label>
                <input id="login-form-password" name="password" type="password" value="" class="form-control">
                @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <button id="login-form-submit" type="submit" class="btn btn-block btn-primary">@lang('login.authenticate')</button>
            </div>
            {!! csrf_field() !!}
        </form>
        <p><a href="{{ route('register.index') }}">@lang('login.register_instead')</a></p>
    </div>
    
@endsection
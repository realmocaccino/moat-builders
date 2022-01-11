@extends('layouts.public')

@section('title', 'Login')

@section('content')

    <div class="container">
        <form id="login-form" method="post" action="{{ route('login.authenticate') }}">
            @if($errors->has('failed-login'))
                <div class="alert alert-warning">{{ $errors->first('failed-login') }}</div>
            @endif
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
                <p><button id="login-form-submit" type="submit" class="btn btn-block btn-primary">@lang('login.authenticate')</button></p>
                <p class="text-center"><a href="{{ route('register.index') }}">@lang('login.register_instead')</a></p>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
    
@endsection
@extends('layouts.public')

@section('title', 'Register')

@section('content')

    <div class="container">
        <form id="register-form" method="post" action="{{ route('register.submit') }}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            	<label for="register-form-name">@lang('register.name')</label>
                <input id="register-form-name" name="name" type="text" value="{{ old('name') }}" class="form-control">
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div><div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            	<label for="register-form-username">@lang('register.username')</label>
                <input id="register-form-username" name="username" type="text" value="{{ old('username') }}" class="form-control">
                @if($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            	<label for="register-form-password">@lang('register.password')</label>
                <input id="register-form-password" name="password" type="password" value="" class="form-control">
                @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
            	<label for="register-form-role">@lang('register.role')</label>
                <select id="register-form-role" name="role" class="form-control">
                    <option value="user" @if(old('role') == 'user')) selected @endif>@lang('register.user')</option>
                    <option value="admin" @if(old('role') == 'admin')) selected @endif>@lang('register.admin')</option>
                </select>
                @if($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <p><button id="register-form-submit" type="submit" class="btn btn-block btn-primary">@lang('register.submit')</button></p>
                <p class="text-center"><a href="{{ route('login.index') }}">@lang('register.login_instead')</a></p>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
    
@endsection
<!doctype html>
<html>
	<head>
		<title>@yield('title') - {{ config('app.name') }}</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
		<link href="{{ asset('css/reset.css') }}" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
	    <div class="container-fluid">
            <div class="row" id="header">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <h1><a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a></h1>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav col-7">
                                <li class="nav-item">
                                    <a class="nav-link @if(Route::is('home')) active @endif" href="{{ route('home') }}">@lang('layout.artists')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(Route::is('albums.index')) active @endif" href="{{ route('albums.index') }}">@lang('layout.albums')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(Route::is('albums.createPage')) active @endif" href="{{ route('albums.createPage') }}">@lang('layout.create_album')</a>
                                </li>
                            </ul>
                            <form class="col-5 text-right">
                                <span class="navbar-text">
                                    @lang('layout.hello') {{ auth()->user()->name }}
                                </span>
                                &nbsp;<a class="nav-item" href="{{ route('logout') }}">@lang('layout.logout')</a>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row" id="content">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
	</body>
</html>
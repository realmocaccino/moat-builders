<!doctype html>
<html>
	<head>
		<title>@yield('title') - Moat Builders Web Player</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <h1><a class="navbar-brand" href="{{ route('home') }}">Moat Builders Web Player</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">@lang('layout.artists')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('albums.index') }}">@lang('layout.albums')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('albums.create') }}">@lang('layout.create_album')</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.index') }}">@lang('layout.login')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('albums.index') }}">@lang('layout.register')</a>
                            </li>
                        </ul>
                    @endif
                    @auth
                    <form class="d-flex">
                        <span class="navbar-text">
                            @lang('layout.hello') {{ auth()->user()->name }}
                        </span>
                        <a class="nav-link" href="{{ route('logout') }}">@lang('layout.logout')</a>
                    </form>
                    @endauth
                </div>
            </div>
        </nav>
	    <div class="container">
		    @yield('content')
		</div>
	</body>
</html>
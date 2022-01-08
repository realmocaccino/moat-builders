<!doctype html>
<html>
	<head>
		<title>@yield('title') - Moat Builders App</title>
	</head>
	<body>
	    <h1><a href="{{ route('home') }}">Moat Builders App</a></h1>
	    @auth
	        <p>@lang('layout.hello') {{ auth()->user()->name }}</p>
	        <p><a href="{{ route('logout') }}">@lang('layout.logout')</a></p>
	    @endauth
		@yield('content')
	</body>
</html>
<!doctype html>
<html>
	<head>
		<title>@yield('title') - Moat Builders Web Player</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
		<link href="{{ asset('css/reset.css') }}" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
	    <div class="container-fluid">
            <div class="row" id="header">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
                        <h1><a class="navbar-brand" href="{{ route('login.index') }}">Moat Builders Web Player</a></h1>
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
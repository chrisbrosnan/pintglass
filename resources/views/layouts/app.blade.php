	<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PintglassLDN') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="https://pintglassldn.com/resources/styles.css" rel="stylesheet">

	<style>
		.col-md-3.navbar-nav.ml-auto.text-center.row
		{
			padding: 0;
		}
		.col-md-3.navbar-nav.ml-auto.text-center.row li a
		{
			color: #000;
			font-weight: 600;
		}

		.nav-item.col-6:hover
		{
			background: #e1e1e1;
		}
	</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img title="PintglassLDN Logo" src="https://pintglassldn.com/storage/images/pintglassldn-logo.jpg" style="max-height: 40px;"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="col-md-9">
						<header-menu></header-menu>
					</div>

                    <!-- Right Side Of Navbar -->
                    <ul class="col-md-3 navbar-nav ml-auto text-center row" style="border: #e1e1e1 solid 1px;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item col-6">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item col-6">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item col-12">
                                <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
		</nav>

		@guest
			<in-app-menu></in-app-menu>
		@else
			<in-app-menu></in-app-menu>
		@endguest

		@yield('content')
		
		<footer-block></footer-block>
    </div>
	<script src="/js/app.js"></script>
</body>
</html>

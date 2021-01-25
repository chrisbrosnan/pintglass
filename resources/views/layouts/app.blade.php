<!doctype html>
<html amp lang="en" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
    <script async src="https://cdn.ampproject.org/v0.js"></script>

	{{ $globalData['header_scripts'] }}
	
    <title>{{ config('app.name', 'PintglassLDN') }}</title>
    <link rel="canonical" href="{{ URL::current() }}">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	
	<!-- Scripts -->
    <script async src="{{ asset('js/app.js') }}" defer></script>
	
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="https://pintglassldn.com/resources/styles.css" rel="stylesheet">
	
    <script async type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "Open-source framework for publishing content",
        "datePublished": "2015-10-07T12:02:41Z",
        "image": [
          "logo.jpg"
        ]
      }
    </script>
	
	<style amp-boilerplate>
		{{ $globalData['header_styles'] }}
	</style>

</head>
<body>
	
    <div id="app">
       	
		@include('includes.header')

		@guest
			<!--- no menu --->
		@else
		
		@endguest

		@yield('content')
		
		@include('includes.footer')
		
    </div>
	
	<script>
		// window.onscroll = function() {stickyNavbarFunction()};

		// var navbar = document.getElementById("navbar");
		// var contentDiv = document.getElementById("content");  
		// var sticky = navbar.offsetTop;

		// function stickyNavbarFunction() {
		// 	if (window.pageYOffset >= sticky) {
		// 		navbar.classList.add("sticky")
		// 		contentDiv.classList.add("pt-7"); 
		// 	} else {
		// 		navbar.classList.remove("sticky");
		// 		contentDiv.classList.remove("pt-7"); 
		// 	}
		// }
	</script>
	
</body>
</html>

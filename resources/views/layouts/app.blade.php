<!doctype html>
<html amp lang="en" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
    <script async src="https://cdn.ampproject.org/v0.js"></script>
	
    <title>{{ config('app.name', 'PintglassLDN') }}</title>
    <link rel="canonical" href="https://amp.dev/documentation/guides-and-tutorials/start/create/basic_markup/">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	
	<!-- Scripts -->
    <script async src="{{ asset('js/app.js') }}" defer></script>
	<script async src="https://use.fontawesome.com/462a50e347.js"></script>
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	
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
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script async src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script async src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script async src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script async src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>
	
	<style amp-boilerplate>
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
		@media only screen and (max-width: 800px) {
			.dtOnly 
			{
				display: none !important; 
			}
		}
		footer {
			background: #fff; 
			border-top: #a1a1a1 2px solid; 
			min-height: 200px;
			padding-bottom: 2em;
		}	
		#copyright, .footer-col-social {
			padding-bottom: 1em; 	
		}

		.footer-col h5 {
			text-transform: uppercase; 	
			margin-top: 1em;
			display: none; 
		}

		.footer-col a, .footer-col a:hover {
			color: #000; 	
			text-decoration: none; 
		}
		ul.navbar-nav a {
			font-weight: 600; 
			color: #333; 
		}
		ul.navbar-nav a:hover {
			border-bottom: 2px solid #000; 
			text-decoration: none; 
		}
		
		/*** New Styles ***/ 

		.content {
		  	padding: 16px;
		}

		.sticky {
		  	position: fixed;
		  	top: 0;
			z-index: 999;
		  	width: 100%;
		}

		.sticky + .content {
		  	padding-top: 60px;
		}
		
		a, a:hover {
			text-decoration: none; 
		}
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
		window.onscroll = function() {stickyNavbarFunction()};

		var navbar = document.getElementById("navbar");
		var contentDiv = document.getElementById("content");  
		var sticky = navbar.offsetTop;

		function stickyNavbarFunction() {
			if (window.pageYOffset >= sticky) {
				navbar.classList.add("sticky")
				contentDiv.classList.add("pt-5"); 
			} else {
				navbar.classList.remove("sticky");
				contentDiv.classList.remove("pt-5"); 
			}
		}
	</script>
	
</body>
</html>

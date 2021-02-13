<!doctype html>
<html amp lang="en" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
    <script async src="https://cdn.ampproject.org/v0.js"></script>

    @if(isset($globalData['header_scripts']))
  	  {!! $globalData['header_scripts'] !!}
    @endif
	
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
	
  @if(isset($globalData['header_styles']))
    <style amp-boilerplate>
      {{ $globalData['header_styles'] }}
    </style>
  @endif

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

  @if(isset($globalData['footer_scripts']))
  	{!! $globalData['footer_scripts'] !!}
  @endif
	
</body>
</html>
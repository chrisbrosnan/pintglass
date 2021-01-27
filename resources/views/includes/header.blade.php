<div id="navbar" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			<amp-img title="PintglassLDN Logo" src="https://pintglassldn.com/storage/images/pintglassldn-logo.jpg" width="40" height="40"></amp-img>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<div class="col-md-9">

				<div class="col-12 row">
					<ul class="col-12 row navbar-nav mr-auto text-center">
						<li class="col-12 col-md-6">
							<a href="{{ URL::to('/') }}/beverages">Beverages</a>
						</li>
						<li class="col-12 col-md-6">
							<a href="{{ URL::to('/') }}/blog">Blog</a>
						</li>
					</ul>
				</div>

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
</div>
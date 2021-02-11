@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div id="content" class="col-12 col-md-10 m-5">
				<div class="card">
					<div class="card-header text-center">
						<h1></h1>
					</div>
					<div class="card-body">
						<div class="container">
							<div class="row">
									@if($pageSlug == 'beverages')
										<div class="col-12">
											@php($i = 0)
											<div class="col-12 row mb-4">
												<div class="col-12 pb-3 text-center">
													<h1>Beverages</h1>
												</div>
												@foreach($bevData['entries'] as $b)
													<a class="col-12 col-md-3" href="https://pintglassldn.com/beverages/{{ $b['slug'] }}">
														<div class="p-0" style="height: 200px; background: url('{{ $b['image']['path'] }}'); background-size: cover; background-position: center center;">
															<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">{{ $b['name'] }} (ABV {{ $b['abv'] }} %)<br/>
															<scan class="font-weight-normal" style="font-weight: .5em;">{{ $b['brewery'] }} in {{ $b['town_origin'] }}, {{ $b['country_origin'] }}</span></p>
														</div>
													</a>
												@endforeach
											</div>
										</div>
									@elseif($pageSlug == 'blog')
										<div class="col-12">
											<div class="col-12 row mb-4">
												<div class="col-12 pb-3 text-center">
													<h1>Blog</h1>
												</div>
												@foreach($bevData['entries'] as $b)
													<a class="col-12 col-md-3" href="https://pintglassldn.com/beverages/{{ $b['slug'] }}">
														<div class="p-0" style="height: 200px; background: url('{{ $b['image']['path'] }}'); background-size: cover; background-position: center center;">
															<p class="col-12 text-white font-weight-bold py-2 bg-dark" style="line-height: 1.3em;">{{ $b['name'] }} (ABV {{ $b['abv'] }} %)<br/>
															<scan class="font-weight-normal" style="font-weight: .5em;">{{ $b['brewery'] }} in {{ $b['town_origin'] }}, {{ $b['country_origin'] }}</span></p>
														</div>
													</a>
												@endforeach
											</div>
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

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
												@foreach($bevData as $b)
													@php($i++)
													@if($i > 1)
														{{ $i }}<br/>
														@php(print_r($bevData))
													@endif
												@endforeach
											</div>
										</div>
									@else 
										<div class="col-12 col-md-4">
											<amp-img class="col-12" src="" width="300" height="400"></amp-img>
										</div>
										<div class="col-12 col-md-8">
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

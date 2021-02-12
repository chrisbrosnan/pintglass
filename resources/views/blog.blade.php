@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div id="content" class="col-12 col-md-10 m-5">
				<div class="card">
					<div class="card-header text-center">
						<h1>{{ $blogData[0]['name'] }}</h1>
					</div>
					<div class="card-body">
						<div class="container">
							<div class="row">

								<div class="col-12">

									@php(print_r($blogData))

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

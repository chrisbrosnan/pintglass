@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div id="content" class="col-12 col-md-10 m-5">
				<div class="card">
					<div class="card-header text-center">
						<h1>{{ $pageTitle }}</h1>
					</div>
					<div class="card-body">
						<div class="container">
							<div class="row">
								<div class="col-12 col-md-4">
									<amp-img class="col-12" src="<?php echo $pageImg; ?>" width="300" height="400"></amp-img>
								</div>
								<div class="col-12 col-md-8">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

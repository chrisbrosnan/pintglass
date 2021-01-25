@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 m-5">
				<div class="card">					
					<div class="card-body row">
						{{ html_entity_decode($beverageFeed) }}
						<br/><br/>
						{{ html_entity_decode($blogFeed) }}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

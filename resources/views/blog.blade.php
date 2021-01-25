@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div id="content" class="col-12 col-md-10 m-5">
				<div class="card">
					<div class="card-header text-center">
						<h1>{{ $blogData['name'] }}</h1>
					</div>
					<div class="card-body">
						<div class="container">
							<div class="row">
								<div class="col-12 col-md-4">
									<amp-img class="col-12" src="{{ URL::to('/') }}/{{ $bevData['image']['path'] }}" width="300" height="400"></amp-img>
									
									<div class="col-12 text-center mb-4 p-0 m-0">
										<script type="text/javascript">amzn_assoc_ad_type ="responsive_search_widget"; amzn_assoc_tracking_id ="chrisbrosna0e-21"; amzn_assoc_marketplace ="amazon"; amzn_assoc_region ="GB"; amzn_assoc_placement =""; amzn_assoc_search_type = "search_widget";amzn_assoc_width ="300"; amzn_assoc_height ="300"; amzn_assoc_default_search_category =""; amzn_assoc_default_search_key ="{{ $blogData['affiliate_keyword'] }}";amzn_assoc_theme ="light"; amzn_assoc_bg_color ="FFFFFF"; </script><script src="//z-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&Marketplace=GB"></script>
									</div>
									
									<a class="twitter-timeline" href="https://twitter.com/pintglass_ldn?ref_src=twsrc%5Etfw">
										Tweets by pintglass_ldn
									</a> 
									<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
									
								</div>
								<div class="col-12 col-md-8">
									{!! $blogData['content'] !!}
									
									<h2 class="text-upper mt-2 mb-2">Related articles</h2>
									<div class="mb-4">
										<!---  --->
									</div>
									<h2 class="text-upper mt-2 mb-2">Comments</h2>
									<div class="fb-comments" data-href="https://pintglassldn.com/beverages/punk-ipa" data-numposts="5" data-width=""></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

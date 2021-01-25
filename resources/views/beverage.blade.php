@extends('layouts.app')

@section('content')

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div id="content" class="col-12 col-md-10 m-5">
				
				<div id="content-card" class="card">
					<div class="card-header text-center">
						<h1>{{ $bevData['title'] }} (ABV {{ $bevData['abv'] }}%)</h1>
					</div>
					<div class="card-body">
						<div class="container">
							<div class="row">
								<div class="col-12 col-md-4">
									<amp-img class="mb-2" alt="<?php echo $pageTitle; ?>" src="<?php echo $pageImg; ?>" height="1000" width="1000" layout="responsive"></amp-img>
									<div class="mb-4 text-center">
										<button class="fav-btn">
											Add to Favourites
										</button>
									</div>
									
									<div class="col-12 text-center mb-4 p-0 m-0 dtOnly">
										<script type="text/javascript">amzn_assoc_ad_type ="responsive_search_widget"; amzn_assoc_tracking_id ="chrisbrosna0e-21"; amzn_assoc_marketplace ="amazon"; amzn_assoc_region ="GB"; amzn_assoc_placement =""; amzn_assoc_search_type = "search_widget";amzn_assoc_width ="300"; amzn_assoc_height ="300"; amzn_assoc_default_search_category =""; amzn_assoc_default_search_key ="<?php echo $bevData['affiliate_keyword']; ?>";amzn_assoc_theme ="light"; amzn_assoc_bg_color ="FFFFFF"; </script><script src="//z-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&Marketplace=GB"></script>
									</div>
									
									<a class="twitter-timeline dtOnly" href="https://twitter.com/pintglass_ldn?ref_src=twsrc%5Etfw">
										Tweets by pintglass_ldn
									</a> 
									<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
								</div>
								<div class="col-12 col-md-8">
									<h2 class="text-upper mb-2">Key details</h2>
									<table class="col-12">
										<tbody>
											<tr class="text-upper">
												<th>
													Brewer
												</th>
												<th>
													First Brewed
												</th>
												<th>
													Reviews
												</th>
											</tr>
											<tr>
												<td>
													{{ $bevData['brewery'] }}
												</td>
												<td>
													{{ $bevData['year_brewed'] }}
												</td>
												<td>
													<!--- Count Reviews --->
												</td>
											</tr>
											<tr class="text-upper">
												<th>
													Place of Origin
												</th>
												<th>
													Type
												</th>
												<th>
													Favourites
												</th>
											</tr>
											<tr>
												<td>
													{{ $bevData['town_origin'] }}
												</td>
												<td>
													{{ $bevData['type'] }}
												</td>
												<td class="grey-cell">
													
												</td>
											</tr>
										</tbody>
									</table>
									<br/>
									<h2 class="text-upper mt-2 mb-2">PintglassLDN review</h2>
									 <br/>
									<p class="mt-2 mb-0 pt-2">
										<span style="font-weight: 500;"><em>PintglassLDN Rating</em></span><br/>
										@foreach(range(1, $bevData['pintglass_rating']) as $n)
											<i class="fas fa-star yellow-star"></i>
										@endforeach
										@foreach(range(1, 5 - $bevData['pintglass_rating']) as $n)
											<i class="fas fa-star grey-star"></i>
										@endforeach
										{{ $bevData['pintglass_rating'] }} / 10
									</p>
									<br/>
									<h2 class="text-upper mt-2 mb-2">User reviews</h2>
									<div class="mb-4">
										<!--- Reviews here --->
										<!--- Count Reviews --->
									</div>
									<!--<h2 class="text-upper mt-2 mb-2">Others from <em>{{ $bevData['brewery'] }}</em></h2>
									<div class="mb-4">
										
									</div>-->
									<!--<h2 class="text-upper mt-2 mb-2">Similar beverages</h2>
									<div class="mb-4">

									</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

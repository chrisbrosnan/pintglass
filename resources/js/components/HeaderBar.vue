<template>
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="position: fixed; width: 100%;">
    	<div class="container">
			<a class="navbar-brand" href="https://pintglassldn.com/">
				<img title="PintglassLDN Logo" src="https://pintglassldn.com/storage/images/pintglass-logo.gif" style="max-height: 40px;"/>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<div class="col-md-9">
					<header-menu></header-menu>
				</div>
				<!-- Right Side Of Navbar -->
				<ul class="col-md-3 navbar-nav ml-auto text-center row" style="border: #e1e1e1 solid 1px;">
					<li class="nav-item col-6">
						<a class="nav-link" href="https://pintglassldn.com/login">Login</a>
					</li>
					<li class="nav-item col-6">
						<a class="nav-link" href="https://pintglassldn.com/register">Register</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>

<script>
    export default {
		name: 'header-bar', 
		mounted() {
			console.log('Component mounted: HeaderBar')
		}
    }
</script>
	
<style scoped>
	
</style>

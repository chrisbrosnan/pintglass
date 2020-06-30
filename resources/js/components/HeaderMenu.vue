<template>
	<div class="col-12 row">
		<ul class="col-12 row navbar-nav mr-auto text-center">
			<li class="col-3">
				<a :href="homeurl + 'about'">About</a>
			</li>
			<li class="col-3">
				<a :href="homeurl + 'venues'">Venues</a>
			</li>
			<li class="col-3">
				<a :href="homeurl + 'beverages'">Beverages</a>
			</li>
			<li class="col-3">
				<a :href="homeurl + 'search'">Search</a>
			</li>
			<!----<li class="col-3">
				<a :href="homeurl + 'blog'">Blog</a>
			</li>---->
		</ul>
	</div>
</template>

<script>
    export default {
		name: 'header-menu', 
		data() {
			return {
				homeurl: 'https://pintglassldn.com/'
			}
		},
        mounted() {
            console.log('Component mounted: HeaderMenu')
        }
    }
</script>

<style scoped>
	ul.navbar-nav a {
		font-weight: 600; 
		color: #333; 
	}
	ul.navbar-nav a:hover {
		border-bottom: 2px solid #000; 
		text-decoration: none; 
	}
</style>

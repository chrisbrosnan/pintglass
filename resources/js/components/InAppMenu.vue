<template>
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="width: 100%;">
    	<div class="container">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="col-12 row">
					<ul class="col-12 row navbar-nav mr-auto text-center">
						<li class="col-2">
							<a :href="homeurl + 'dashboard'">Dashboard</a>
						</li>
						<li class="col-2">
							<a :href="homeurl + 'my-profile'">My Profile</a>
						</li>
						<li class="col-2">
							<a :href="homeurl + 'friends'">Friends</a>
						</li>
						<li class="col-2">
							<a :href="homeurl + 'groups'">Groups</a>
						</li>
						<li class="col-2">
							<a :href="homeurl + 'lists'">Lists</a>
						</li>
						<li class="col-2">
							<a :href="homeurl + 'settings'">Settings</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</template>

<script>
    export default {
		name: 'in-app-menu', 
		data() {
			return {
				homeurl: 'https://pintglassldn.com/'
			}
		},
		mounted() {
            console.log('Component mounted: InAppMenu')
        }
    }
</script>
	
<style scoped>
	nav {
		background: #e4e4e4 !important;	
	}
	
	nav a, nav a:hover {
		color: #000; 
		text-decoration: none; 
		font-weight: 600;
	}
</style>

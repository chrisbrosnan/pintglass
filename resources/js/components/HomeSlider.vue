<template>
	<div class="container-fluid jumbotron" id="homeSlider" style="background: none;">
	</div> 
</template>

<script>
    export default {
		name: 'home-slider', 
		mounted() {
			console.log('Component mounted: HomeSlider')
		}
    }
</script>
	
<style scoped>
	#homeSlider {
		margin: 0; 
		padding: 0;
		min-height: 650px;
	}	
	#homeImage {
		width: 100%; 
	}
</style>
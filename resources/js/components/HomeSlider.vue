<template>
	<div class="container-fluid" id="homeSlider">
		
	</div>
</template>

<script>
    export default {
		name: 'home-slider', 
		data() {
			return {
				homeurl: 'https://pintglassldn.com/'
			}
		},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
	
<style scoped>
	#homeSlider {
		height: 400px; 
		background: #e1e1e1;
	}	
</style>
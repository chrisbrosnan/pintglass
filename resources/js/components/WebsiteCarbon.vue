<template>
	<div class="col-12 text-center">
		<div id="wcb" class="wcb carbonbadge"></div>
	</div>
</template>

<script>
    export default {
		name: 'website-carbon', 
	 	created() {
			var scripts = [
				"https://unpkg.com/website-carbon-badges@^1/b.min.js"
			];
			scripts.forEach(script => {
				let tag = document.createElement("script");
				tag.setAttribute("src", script);
				document.head.appendChild(tag);
			});
	  	}, 
		mounted() {
            console.log('Component mounted: WebsiteCarbon')
        }
    }
</script>
	
<style scoped>
	
</style>
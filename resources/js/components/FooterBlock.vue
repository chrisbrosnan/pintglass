<template>
	<footer class="container-fluid">
		<div class="row">
			<div class="col-12 row text-center">
				<div class="col-12 footer-col">
					<h5>Social links</h5>	
				</div>
				<div class="col-4"></div>
				<div class="col-4 footer-col-social">
					<a title="Pintglass - Twitter Profile" :href="twitter"><i class="fab fa-twitter"></i></a>
					<a title="Pintglass - Instagram Profile" :href="insta"><i class="fab fa-instagram"></i></a>
				</div>
				<div class="col-4"></div>
			</div>
			<div id="copyright" class="col-12 text-center">
				<p><em>Copyright &copy; {{ year }} {{ company }}. All Rights Reserved.</em></p>
			</div>
			<website-carbon></website-carbon>
		</div>
	</footer>
</template>

<script>
	var date = new Date();
	
	import WebsiteCarbon from './WebsiteCarbon'
	
    export default {
		name: 'footer-block', 
	    components: {
			WebsiteCarbon
		}, 
		data() {
			return {
				homeurl: 'https://pintglassldn.com/', 
				year: date.getFullYear(), 
				insta: 'https://instragram.com/pintglassldn', 
				twitter: 'https://twitter.com/pintglass_ldn', 
				company: 'Blue Cat Software'
			}
		},
        mounted() {
            console.log('Component mounted: FooterBlock')
        }
    }
</script>

<style scoped>
	footer {
		background: #fff; 
		border-top: #a1a1a1 2px solid; 
		min-height: 200px;
	}
	
	#copyright, .footer-col-social {
		padding-bottom: 1em; 	
	}
	
	.footer-col h5 {
		text-transform: uppercase; 	
		margin-top: 1em;
		display: none; 
	}
	
	.footer-col a, .footer-col a:hover {
		color: #000; 	
		text-decoration: none; 
	}
</style>

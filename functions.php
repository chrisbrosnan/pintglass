<?php

add_theme_support( 'post-thumbnails' ); 
wp_enqueue_script( 'google-maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyD4tyzzQAmvwy9NH_WU9xv1lgYlz00X_LQ&sensor=false' );

//TODO: fix api key for advanced custom field
add_action('acf/fields/google_map/api', function($api){
	$api['key'] = 'AIzaSyD4tyzzQAmvwy9NH_WU9xv1lgYlz00X_LQ';
	return $api;
});

add_shortcode('terms_feed', 'tax_terms_feed');
function tax_terms_feed(){
	global $post;
	$path = get_template_directory_uri() . '/images/taxonomies/';
	$pageSlug = $post->post_name;
	echo '<div style="text-align: center;">';
		$terms = get_terms( array( 'taxonomy' => $pageSlug, 'hide_empty' => false, ) );
		foreach($terms as $term){
			echo '<div style="display: inline-block; width: 50%; margin-bottom: 2em;">';
			echo '<a href="'.get_term_link($term->term_id).'"><img style="width: 70%;" src="'.$path.$term->slug.'.png"/></a>';
			echo '<p style="margin-top: 0;"><a style="color: #000;" href="'.get_term_link($term->term_id).'">'.$term->name.'</a></p>';
			echo '</div>';
		}
	echo '</div>';
}

add_shortcode('area_terms_feed', 'area_tax_terms_feed');
function area_tax_terms_feed(){
	global $post;
	$path = get_template_directory_uri() . '/images/taxonomies/';
	$pageSlug = $post->post_name;
	echo '<div style="text-align: center;">';
		echo '<br/>';
		$terms = get_terms( array( 'taxonomy' => $pageSlug, 'hide_empty' => false, ) );
		foreach($terms as $term){
			echo '<div style="display: inline-block; width: 50%; margin-bottom: 2em;">';
			//echo '<a href="'.get_term_link($term->term_id).'"><img style="width: 70%;" src="'.$path.$term->slug.'.png"/></a>';
			echo '<p style="margin-top: 0;"><a style="color: #000;" href="'.get_term_link($term->term_id).'">'.$term->name.'</a></p>';
			echo '</div>';
		}
	echo '</div>';
}

add_shortcode('feat_feed', 'feature_tax_feed');
function feature_tax_feed(){
	global $post; 
	$pSlug = $post->post_name;
	$args = array( 'post_type' => 'listing', 'posts_per_page' => 999999, 'orderby' => 'post_title', 'order' => 'ASC', 'tax_query' => array( array( 'taxonomy' => 'feature', 'terms' => $pSlug, 'field' => 'slug' ) ) ); 
    $the_query = new WP_Query( $args ); 
	while( $the_query->have_posts() ){
		if ( $the_query->have_posts() ) {
			$the_query->the_post();
			$id = get_the_id(); 
			$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
			$uri = get_permalink($id);
			echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
			echo '<h4><em>'.get_the_title().'</em></h4>';
			echo '</div></a>';
			echo '<br/>';
			/* Restore original Post Data */
			wp_reset_postdata();
		}
	}
}

add_shortcode('food_feed', 'food_tax_feed');
function food_tax_feed(){
	global $post; 
	$pSlug = $post->post_name;
	$args = array( 'post_type' => 'listing', 'posts_per_page' => 999999, 'orderby' => 'post_title', 'order' => 'ASC', 'tax_query' => array( array( 'taxonomy' => 'food', 'terms' => $pSlug, 'field' => 'slug' ) ) ); 
    $the_query = new WP_Query( $args ); 
	while( $the_query->have_posts() ){
		if ( $the_query->have_posts() ) {
			$the_query->the_post();
			$id = get_the_id(); 
			$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
			$uri = get_permalink($id);
			echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
			echo '<h4><em>'.get_the_title().'</em></h4>';
			echo '</div></a>';
			echo '<br/>';
			/* Restore original Post Data */
			wp_reset_postdata();
		}
	}
}

add_shortcode('area_feed', 'area_tax_feed');
function area_tax_feed(){
	global $post; 
	$pSlug = $post->post_name;
	$args = array( 'post_type' => 'listing', 'posts_per_page' => 999999, 'orderby' => 'post_title', 'order' => 'ASC', 'tax_query' => array( array( 'taxonomy' => 'area', 'terms' => $pSlug, 'field' => 'slug' ) ) ); 
    $the_query = new WP_Query( $args ); 
	while( $the_query->have_posts() ){
		if ( $the_query->have_posts() ) {
			$the_query->the_post();
			$id = get_the_id(); 
			$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
			$uri = get_permalink($id);
			echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
			echo '<h4><em>'.get_the_title().'</em></h4>';
			echo '</div></a>';
			echo '<br/>';
			/* Restore original Post Data */
			wp_reset_postdata();
		}
	}
}

add_shortcode('theme_feed', 'theme_tax_feed');
function theme_tax_feed(){
	global $post; 
	$pSlug = $post->post_name;
	$args = array( 'post_type' => 'listing', 'posts_per_page' => 999999, 'orderby' => 'post_title', 'order' => 'DESC', 'tax_query' => array( array( 'taxonomy' => 'theme', 'terms' => $pSlug, 'field' => 'slug' ) ) ); 
    $the_query = new WP_Query( $args ); 
	while( $the_query->have_posts() ){
		if ( $the_query->have_posts() ) {
			$the_query->the_post();
			$id = get_the_id(); 
			$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
			$uri = get_permalink($id);
			echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
			echo '<h4><em>'.get_the_title().'</em></h4>';
			echo '</div></a>';
			echo '<br/>';
			/* Restore original Post Data */
			wp_reset_postdata();
		}
	}
}

add_shortcode('my_favourites', 'my_favourites_feed');
function my_favourites_feed(){
	$userID = get_current_user_id(); 
	$favIDs = get_user_meta($userID, 'favourites'); 
	$favListings = array();
	$remove = $_GET['removeFav'];
	//echo $remove;
	foreach($favIDs as $favID){
		array_push($favListings, $favID[0]);
		//echo $favID[0] . '<br/>';
	}
	$args = array('post_type' => 'listing', 'post__in' => array_diff($favListings, $remove));
	// The Query
	$the_query = new WP_Query( $args );
	$favURL = get_the_permalink();
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$id = get_the_id(); 
		$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
		$uri = get_permalink($id);
		echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
		echo '<h4>'.get_the_title().'</h4>';
		//echo '<a href="'.$favURL.'?removeFav='.$id.'"><img id="favCard" style="margin: 0 0 1em 1em;" src="http://35.197.249.54/wp-content/uploads/2018/07/star-filled.png"/></a>';
		echo '</div></a>';
		echo '<br/>';
		/* Restore original Post Data */
		wp_reset_postdata();
	}
}

add_action('wp_head', 'add_listing_acc_styling');
function add_listing_acc_styling(){
	echo '<style>
		@media only screen and (max-device-width: 736px) {
			#main button.accordion {
				font-size: 3.2em !important; 
			}
		}
		.accordion {
			background-color: #eee;
			color: #444;
			cursor: pointer;
			padding: 18px;
			width: 100%;
			border: none;
			text-align: left;
			outline: none;
			font-size: 15px;
			transition: 0.4s;
		}

		.active, .accordion:hover {
			background-color: #ccc; 
		}

		.panel {
			padding: 0 18px;
			display: none;
			background-color: white;
			overflow: hidden;
		}
		</style>';
}

add_shortcode('all_listings', 'all_listings_feed');
function all_listings_feed(){
	$args = array('post_type' => 'listing', 'posts_per_page' => 999999999, 'orderby' => 'title', 'order' => 'asc'); 
	$the_query = new WP_Query( $args ); 
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$id = get_the_id(); 
		$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
		$uri = get_permalink($id);
		echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
		echo '<h4>'.get_the_title().'</h4>';
		echo '</div></a>';
		echo '<br/>';
		/* Restore original Post Data */
		wp_reset_postdata();
	}
}

add_shortcode('blog_posts', 'blog_posts_feed');
function blog_posts_feed(){
	$args = array('post_type' => 'post', 'posts_per_page' => 999999999); 
	$the_query = new WP_Query( $args ); 
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$id = get_the_id(); 
		$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
		$uri = get_permalink($id);
		echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
		echo '<h4>'.get_the_title().'</h4>';
		echo '</div></a>';
		echo '<br/>';
		/* Restore original Post Data */
		wp_reset_postdata();
	}
}

add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	//print_r($template); 
}

add_action('display_listing_taxonomies', 'display_listing_taxonomies');
function display_listing_taxonomies(){
	echo get_the_id();
}
	
add_action('display_listing_fields', 'display_listing_fields');
function display_listing_fields(){
	echo get_the_id();
}

add_action('init', 'add_listings_pt');
function add_listings_pt(){
    $args = array(
      'public' => true,
      'label'  => 'Listings', 
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
    register_post_type( 'listing', $args );
}

add_action('init', 'add_taxonomies');
function add_taxonomies(){
    $tax_list = array('Features', 'Beverages', 'Theme', 'Area', 'Food');
    foreach($tax_list as $tax){
        register_taxonomy(
            strtolower($tax),
            'listing',
            array(
                'label' => __( $tax ),
                'rewrite' => false,
                'hierarchical' => true,
				'has_archive' => true, 
				'rewrite' => array( 'slug' => strtolower($tax) ),
            )
        );
    }
}

function head_comp($file){
    $path = get_template_directory() . '/components/header/' . $file . '.php';
    include($path);
}

function foot_comp($file){
    $path = get_template_directory() . '/components/footer/' . $file . '.php';
    include($path);
}

function body_comp($file){
    $path = get_template_directory() . '/components/body/' . $file . '.php';
    include($path);
}

function func_comp($file){
    $path = get_template_directory() . '/components/functions/' . $file . '.php';
    include($path);
}

function icon($file){
    $path = get_template_directory_uri() . '/images/icons/' . $file . '.png';
    echo '<img id="icon_'.$file.'" class="icons" src="'.$path.'" style="width: 40%; padding: 2em;"/>';
}

function temp_icon($file){
    $path = home_url() . '/wp-content/uploads/2018/07/' . $file . '.png';
    echo '<img id="icon_'.$file.'" class="icons" src="'.$path.'" style="width: 10%; padding: 1em;"/>';
}

function soc_icon($file){
    $path = get_template_directory_uri() . '/images/icons/social/' . $file . '.png';
    echo '<img class="social_icons" src="'.$path.'" style="padding: 1em 1.5em 1em 1.5em;"/>';
}

function menu_banner($file){
    $path = get_template_directory_uri() . '/images/menu_banners/' . $file . '.jpg';
    return $path;
}

function close_div(){
    echo '</div>';
}

function border_open($id){
    echo '<div id="'.$id.'">';
}

function inner_open(){
    echo '<div style="padding: 0 1.5em;">';
}

function foot_open(){
    echo '<div id="footer-inner" style="padding: 1.5em; text-align: center;">';
}

add_action('wp_head', 'head_tags');
function head_tags(){ ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans+Condensed:300|Oswald|Ubuntu" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>"/>
<?php }

add_action('wp_head', 'add_jquery');
function add_jquery(){ 
    $jquery_path = 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'; ?>
    <script src="<?php echo $jquery_path; ?>"></script>
<?php }

add_action('wp_head', 'head_scripts');
function head_scripts(){ 
    $menuimg_path = get_site_url() . '/wp-content/themes/pintglass/images/icons/'; ?>
    <script>
		function bodyTopMargin(){
			var h = document.getElementById("header").clientHeight;
			document.getElementById("main").style.marginTop = h + "px"; 
			//document.getElementById("dropdown_search").style.marginTop = h + "px"; 
			//document.getElementById("dropdown_menu").style.marginTop = h + "px"; 
			//document.getElementById("dropdown_profile").style.marginTop = h + "px"; */
		}
        function toggleMenu(){
            var hamburger = document.getElementById("icon_hamburger");
            var spyglass = document.getElementById("icon_search");
            var avatar = document.getElementById("icon_profile");
            var menu = document.getElementById("dropdown_menu");
            var profile = document.getElementById("dropdown_profile");
            var search = document.getElementById("dropdown_search");
            menu.classList.toggle("hidden");
            search.classList.add("hidden");
            profile.classList.add("hidden");
            hamburger.classList.toggle("open_menu");
            spyglass.classList.remove("open_search");
            avatar.classList.remove("open_profile");
        }
        function toggleSearch(){
            var hamburger = document.getElementById("icon_hamburger");
            var spyglass = document.getElementById("icon_search");
            var avatar = document.getElementById("icon_profile");
            var menu = document.getElementById("dropdown_menu");
            var profile = document.getElementById("dropdown_profile");
            var search = document.getElementById("dropdown_search");
            menu.classList.add("hidden");
            search.classList.toggle("hidden");
            profile.classList.add("hidden");
            hamburger.classList.remove("open_menu");
            spyglass.classList.toggle("open_search");
            avatar.classList.remove("open_profile");
        }
        function toggleProfile(){
            var hamburger = document.getElementById("icon_hamburger");
            var spyglass = document.getElementById("icon_search");
            var avatar = document.getElementById("icon_profile");
            var menu = document.getElementById("dropdown_menu");
            var profile = document.getElementById("dropdown_profile");
            var search = document.getElementById("dropdown_search");
            menu.classList.add("hidden");
            search.classList.add("hidden");
            profile.classList.toggle("hidden");
            hamburger.classList.remove("open_menu");
            spyglass.classList.remove("open_search");
            avatar.classList.toggle("open_profile");
        }
        window.onload = function() {
			bodyTopMargin();
            document.getElementById("icon_hamburger").onclick = function toggling() {
                toggleMenu();
            }
            document.getElementById("icon_search").onclick = function toggling() {
                toggleSearch();
            }
            document.getElementById("icon_profile").onclick = function toggling() {
                toggleProfile();
            }
        }
    </script>
<?php }

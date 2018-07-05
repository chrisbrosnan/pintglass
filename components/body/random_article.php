<?php

$args = array('post_type' => 'post', 'posts_per_page' => 1, 'orderby' => 'rand'); 
$the_query = new WP_Query( $args ); 

if ( $the_query->have_posts() ) {
	$the_query->the_post();
	$id = get_the_id(); 
	$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
	$uri = get_permalink($id);
	echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
	echo '<h4>Random Article: <em>'.get_the_title().'</em></h4>';
	echo '</div></a>';
	echo '<br/>';
	/*echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}
	echo '</ul>';*/
	/* Restore original Post Data */
	wp_reset_postdata();
}
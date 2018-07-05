<?php

$postID = get_the_id();
$args = array('post_type' => 'post', 'posts_per_page' => 1, 'post__not_in' => array($postID)); 
$the_query = new WP_Query( $args ); 

if ( $the_query->have_posts() ) {
	$the_query->the_post();
	$id = get_the_id(); 
	$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
	$uri = get_permalink($id);
	echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
	echo '<h4>New Article: <em>'.get_the_title().'</em></h4>';
	echo '</div></a>';
	echo '<br/>';
	wp_reset_postdata();
}
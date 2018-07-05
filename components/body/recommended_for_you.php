<?php

global $current_user; 
$postcode = get_user_meta( $current_user->ID, 'billing_postcode', true );
$postcode_space = strpos($postcode, ' '); 
$trim_postcode = substr($postcode, 0, $postcode_space);
//echo $trim_postcode; 

$args = array('post_type' => 'listing', 'posts_per_page' => 1, 'meta_query' => array(
        array(
            'key'       => 'postcode',
            'value'     => $trim_postcode,
            'compare'   => 'REGEXP',
        )
    )); 
$the_query = new WP_Query( $args ); 

if ( $the_query->have_posts() ) {
	$the_query->the_post();
	$id = get_the_id(); 
	$imgURL = wp_get_attachment_url( get_post_thumbnail_id($id) );
	$uri = get_permalink($id);
	echo '<a href='.$uri.'><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
	echo '<h4>Recommended for you: <em>'.get_the_title().'</em></h4>';
	echo '</div></a>';
	echo '<br/>';
	/* Restore original Post Data */
	wp_reset_postdata();
}
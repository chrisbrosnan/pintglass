<?php

$postID = 35; 
$imgURL = wp_get_attachment_url( get_post_thumbnail_id($postID) );
$feat_listing_img = menu_banner('feat_listing_test'); 
$uri = get_permalink($postID);

echo '<br/>';
echo '<a href="'.$uri.'"><div class="menu_card" style="background-image: url('.$imgURL.'); background-size: cover; border: 1px solid #000;">';
echo '<h4>Featured Listing: <em>'.get_the_title($postID).'</em></h4>';
echo '</div></a>';
echo '<br/>';
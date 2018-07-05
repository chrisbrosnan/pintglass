<?php

global $post;
$pageSlug = $post->post_name;
$postID = get_the_id();
$parentID = wp_get_post_parent_id($postID);
$parentInfo = get_post($parentID);
$parentSlug = $parentInfo->post_name;
$parentTitle = get_the_title($parentID);
$unfiltered_title = get_the_title();
$path = get_template_directory_uri() . '/images/taxonomies/';

if(is_front_page()) { 
	$title = 'Pintglass';
} elseif($pageSlug == 'features' || $pageSlug == 'food' || $pageSlug == 'area' || $pageSlug == 'theme' || $pageSlug == 'beverage') {
	$title .= '<br id="mobile"/>';
	$title .= str_replace(" (","<br/>(",$unfiltered_title);
} elseif($parentSlug == 'features' || $parentSlug == 'food' || $parentSlug == 'area' || $parentSlug == 'theme' || $parentSlug == 'beverage' ) {
	$title .= '<a id="taxLink" style="color: #000; text-align: center;" href="/'.$parentSlug.'/"><em>'.$parentTitle.'</em></a><br/>';
	$title .= '<img style="width: 10%; margin-top: .4em;" src="' . $path . $pageSlug . '.png"><br/>';
    $title .= str_replace(" (","<br/>(",$unfiltered_title);
} else {
    $title .= str_replace(" (","<br/>(",$unfiltered_title);
}


//echo '<br/>';
echo '<h1 id="title" style="text-align: center;">'.$title.'</h1>';
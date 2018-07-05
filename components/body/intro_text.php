<?php

global $current_user;
get_currentuserinfo();
$fname = $current_user->user_firstname; 

if(is_user_logged_in() && strlen($fname) > 0){
	$user = 'Hello, ' . $fname;
} else {
	$user = 'Hello';
}

echo '<div style="text-align: center;">';
echo '<p class="intro">'.$user.'. Welcome to Pintglass. Your guide to London pubs based on your interests. Find local pubs in any London borough based on theme, feature, location, food or available beverages.</p>';
echo '</div>';
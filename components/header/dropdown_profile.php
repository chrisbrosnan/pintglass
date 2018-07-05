<?php

$profileImg = get_avatar_url(); 
global $current_user; 
$postcode = get_user_meta( $current_user->ID, 'billing_postcode', true );
$email = get_user_meta( $current_user->ID, 'billing_email', true );
$postcode_space = strpos($postcode, ' '); 
$trim_postcode = substr($postcode, 0, $postcode_space);

echo '<div id="dropdown_profile" class="hidden">';
    echo '<h4>PROFILE</h4>';
	echo '<div id="profile-top">';
		echo '<div style="width: 40%; display: inline-block;">';
			echo '<img src="'.$profileImg.'" style="width: 95%;">';
		echo '</div>';
		echo '<div style="width: 59%; display: inline-block; vertical-align: top;">';
			echo '<p class="editprofile-link" style="text-align: right; margin-bottom: 0; margin-top: 0;"><a style="color: #fff; text-decoration: none;" href="'.home_url().'/edit-profile/">Edit profile</a></p><br/>';
			echo '<p class="profile-email" style="font-size: 1.2em; margin-top: 0;"><strong>Email: </strong><span style="float: right;">'.$email.'</span></p>';
			echo '<p class="profile-postcode" style="font-size: 1.2em; margin-top: 0;"><strong>Postcode: </strong><span style="float: right;">'.$trim_postcode.'</span></p>';
		echo '</div>';
	echo '</div>'; 
    echo '<hr style="visibility: hidden;">'; 
    if(is_front_page()){
        $urlAction = home_url();
    } else {
        $urlAction = home_url($_SERVER['REQUEST_URI']);
    }
	echo '<form action="'.$urlAction.'" method="get">';
        $feat_terms = get_terms('features', array('post_type' => 'listing', 'hide_empty' => false));
        echo '<h4 style="margin-bottom: 15px; letter-spacing: .1em;">Change your preferences</h4>';
        $path = get_template_directory_uri() . '/images/taxonomies/';
        echo '<div style="overflow-y: scroll; max-height: 600px; text-align: left; margin-bottom: 1.2em;">';
            foreach($feat_terms as $term){
                if($term->slug != 'uncategorised'){
                    echo '<div style="width: 48%; vertical-align: top; padding: 0; display: inline-block;">';
                    echo '<input type="checkbox" name="features" value="'.$term->term_id.'"/>';
                    if($term->slug == 'historical-significance'){
                        echo '<img id="'.$term->slug.'" style="width: 10%; margin-right: 5px;" src="'.$path.'historical-importance.png">';
                    } else {
                        echo '<img id="'.$term->slug.'" style="width: 10%; margin-right: 5px;" src="'.$path.$term->slug.'.png">';
                    }
                    if($term->slug == 'historical-significance'){
                        echo '<span id="'.$term->slug.'_span" class="filt_span">Historical</span>';
                    } else {
                        echo '<span id="'.$term->slug.'_span" class="filt_span">'.$term->name;'</span>';
                    }
                    echo '</div>';
                }
            }
        echo '</div>';
        echo '<div style="text-align: center; padding-top: 1em;"><input type="submit" style="width: 40%; text-transform: uppercase; font-size: 2em; padding: 1em;" value="Edit preferences" name="Edit preferences"/></div>';
    echo '</form>';
echo '</div>';


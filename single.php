<?php

get_header();

$postID = get_the_id();

inner_open();

    if(is_singular('listing')){
		$userID = get_current_user_id(); 
		$favIDs = get_user_meta($userID, 'favourites'); 
        body_comp('title');
        echo '<p style="text-align: center; margin-top: 0;"><em>' . get_field('tagline') . '</em></p>';
        the_post_thumbnail();
        $favIDs = get_user_meta($userID, 'favourites'); 
        while ( have_posts() ) : the_post();
			echo '<div>';
                echo '<p>';
                /*if(is_user_logged_in()){
                    if(in_array($postID, $favIDs[0])){
                        echo '<a href="'.get_the_permalink().'?removeFav='.$postID.'"><img style="float: right; width: 10%; margin: 0 0 1em 1em;" src="http://35.197.249.54/wp-content/uploads/2018/07/star-filled.png"/></a>';
                    } else {
                        echo '<a href="'.get_the_permalink().'?addFav='.$postID.'"><img style="float: right; width: 10%; margin: 0 0 1em 1em;" src="http://35.197.249.54/wp-content/uploads/2018/07/star-empty.png"/></a>';
                    }
                }*/
				the_content(); 
                echo '</p>';
			echo '</div>';
        endwhile;
        /*if($_GET['addFav']){
            $addFav = $_GET['addFav'];
            $array1 = $favIDs[0];
            array_push($array1, $addFav);
            update_user_meta( $userID, 'favourites', $addFav );
        }
        if($_GET['removeFav']){
            $removeFav = $_GET['removeFav'];
            $array1 = $favIDs[0];
            $key = array_search($removeFav, $array1);
            $newVal = unset($array1[$key]);
            update_user_meta( $userID, 'favourites', $newVal );
        }*/
        $founded = get_field('founded');
        $openHours = get_field('open_hours');
        $address1 = get_field('address1');
        $address2 = get_field('address2');
        $postcode = get_field('postcode');
        $dresscode = get_field('dress_code');
        $website = get_field('website');
        $email = get_field('email');
        $telephone = get_field('telephone');
        echo '<div id="accordion-container">';
        echo '<button class="acc1 accordion">Key information</button>';
        echo '<div class="acc1 panel" style="padding: 1em; text-align: center;">';
            echo '<div style="width: 50%; display: inline-block; text-align: left; vertical-align: top;">';
                $queryArea = get_the_terms( $postID , 'area' );
                if(!$queryArea){
                    echo '<p><strong>Area: </strong>No area set.</p>';
                } else {
                    foreach($queryArea as $term){
                        $termLink = get_term_link($term->term_id); 
                        echo '<p><strong>Area: </strong><a href="'.$termLink.'">'.$term->name.'</a></p>';
                    }
                }
                if($dresscode){ 
                    echo '<p><strong>Dress code: </strong>'.$dresscode.'</p>'; 
                } 
            echo '</div>';
            echo '<div style="width: 50%; display: inline-block; text-align: left; vertical-align: top;">';
                $queryTheme = get_the_terms( $postID , 'theme' );
                if(!$queryTheme){
                    echo '<p><strong>Theme: </strong>No theme.</p>';
                } else {
                    foreach($queryTheme as $term){
                        $termLink = get_term_link($term->term_id); 
                        echo '<p><strong>Theme: </strong>'.$term->name.'</p>';
                    }
                }
                if($founded){ 
                    echo '<p><strong>Founded: </strong>'.$founded.'</p>'; 
                } else {
                    echo '<p><strong>Founded: </strong>Unknown</p>'; 
                }
            echo '</div>';
            echo '<div>';
                echo '<p style="text-align: left;"><strong>Address:</strong> ' . $address1 . ', ' . $address2 . ', ' . $postcode . '</p>';
            echo '</div>';
        echo '</div>';
        echo '<button class="acc2 accordion">Opening hours</button>';
        echo '<div class="acc2 panel" style="padding: 1em; text-align: center;">';
            if($openHours){ 
                echo '<p style="text-align: left;">'.$openHours.'</p>'; 
            }
        echo '</div>';
        echo '<button class="acc3 accordion">Features</button>';
        echo '<div class="acc3 panel" style="padding: 1em;">';
            $path = get_template_directory_uri() . '/images/taxonomies/';
            $queryFeatures = get_the_terms( $postID , 'features' );
            if(!$queryFeatures){
                echo '<p style="text-align: left;">This listing has no features listed.</p>';
            } else {
                //print_r($queryFeatures);
                foreach($queryFeatures as $term){
                    if($term->slug != 'uncategorised'){
                        $termLink = get_term_link($term->term_id); 
                        echo '<div class="featCard" style="width: 50%; vertical-align: top; padding: 0; display: inline-block;">';
                        //echo '<input type="checkbox" name="features" value="'.$term->term_id.'"/>';
                        echo '<a href="'.$termLink.'"><img id="'.$term->slug.'" style="width: 10%; margin-right: 5px;" src="'.$path.$term->slug.'.png"></a>';
                        if($term->slug == 'historical-importance'){
                            echo '<a href="'.$termLink.'"><span id="'.$term->slug.'_span" class="filt_span">Historical</span></a>';
                        } else {
                            echo '<a href="'.$termLink.'"><span id="'.$term->slug.'_span" class="filt_span">'.$term->name;'</span></a>';
                        }
                        echo '</div></a>';
                    }
                }
            }
        echo '</div>';
        echo '<button class="acc4 accordion">Where is it?</button>';
        echo '<div class="acc4 panel" style="padding: 1em;">'; 
        $location = get_field('location'); 
            if($location){?>
            <div id="map"></div>
            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD4tyzzQAmvwy9NH_WU9xv1lgYlz00X_LQ&callback=initMap"
    async defer></script>
            <script>
                function initMap() {
                    var LatLng = {lat: <?php echo $location['lat']; ?>, lng: <?php echo $location['lng']; ?>};
                    // Create a map object and specify the DOM element
                    // for display.
                    var map = new google.maps.Map(document.getElementById('map'), {
                    center: LatLng,
                    zoom: 16
                    });
                    // Create a marker and set its position.
                    var marker = new google.maps.Marker({
                    map: map,
                    position: LatLng
                    });
                }    
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVfmWg7a1fiRWPHvMtH_6PG2zpIM6gPzQ&callback=initMap" async defer></script>
        <?php } else {
            echo '<p style="text-align: left;">This listing has no location data.</p>';
        }
        echo '</div>';
        echo '<button class="acc5 accordion">Food</button>';
        echo '<div class="acc5 panel" style="padding: 1em;">';
            $queryFood = get_the_terms( $postID , 'food' );
            if(!$queryFood){
                echo '<p style="text-align: left;">This listing has no food listed.</p>';
            } else {
                //print_r($queryFeatures);
                foreach($queryFood as $term){
                    if($term->slug != 'uncategorised'){
                        $termLink = get_term_link($term->term_id); 
                        echo '<div class="featCard" style="width: 50%; vertical-align: top; padding: 0; display: inline-block;">';
                        //echo '<input type="checkbox" name="features" value="'.$term->term_id.'"/>';
                        echo '<a href="'.$termLink.'"><img id="'.$term->slug.'" style="width: 10%; margin-right: 5px;" src="'.$path.$term->slug.'.png"></a>';
                        if($term->slug == 'historical-importance'){
                            echo '<a href="'.$termLink.'"><span id="'.$term->slug.'_span" class="filt_span">Historical</span></a>';
                        } else {
                            echo '<a href="'.$termLink.'"><span id="'.$term->slug.'_span" class="filt_span">'.$term->name;'</span></a>';
                        }
                        echo '</div></a>';
                    }
                }
            }
        echo '</div>';
        echo '<button class="acc6 accordion">Beverages</button>';
        echo '<div class="acc6 panel" style="padding: 1em;">';
            $queryBeverages = get_the_terms( $postID , 'beverages' );
            if(!$queryBeverages){
                echo '<p style="text-align: left;">This listing has no beverages listed.</p>';
            } else {
                //print_r($queryFeatures);
                foreach($queryBeverages as $term){
                    if($term->slug != 'uncategorised'){
                        $termLink = get_term_link($term->term_id); 
                        echo '<div class="featCard" style="width: 50%; vertical-align: top; padding: 0; display: inline-block;">';
                        //echo '<input type="checkbox" name="features" value="'.$term->term_id.'"/>';
                        echo '<img id="'.$term->slug.'" style="width: 10%; margin-right: 5px;" src="'.$path.$term->slug.'.png">';
                        if($term->slug == 'historical-importance'){
                            echo '<span id="'.$term->slug.'_span" class="filt_span">Historical</span>';
                        } else {
                            echo '<span id="'.$term->slug.'_span" class="filt_span">'.$term->name;'</span>';
                        }
                        echo '</div></a>';
                    }
                }
            }
        echo '</div>';
		echo '<button class="acc7 accordion">Social</button>';
        echo '<div class="acc7 panel" style="padding: 1em;">';
            $fbk = get_field('facebook'); 
            $ins = get_field('instagram'); 
            $twi = get_field('twitter');
            echo '<table style="border: none; text-align: center;"><tbody style="border: none;"><tr style="border: none;">';
                if($fbk){
                    echo '<td style="text-align: center; border: none;"><a target="_blank" href="https://facebook.com'.$fbk.'">'.soc_icon('facebook-colour').'</a></td>';
                }
                if($ins){
                    echo '<td style="text-align: center;"><a target="_blank" href="https://instagram.com'.$ins.'">'.soc_icon('instagram-colour').'</a></td>';
                }
                if($twi){
                    echo '<td style="text-align: center;"><a target="_blank" href="https://twitter.com'.$twi.'">'.soc_icon('twitter-colour').'</a></td>';
                }
            if(!$fbk && !$ins && !$twi){
                echo '<p style="text-align: left;">This listing has no social media profiles.</p>';
            }
            echo '</tr></tbody></table>';
        echo '</div>';
        //echo '<button class="accordion">Contact information</button>';
        //echo '<div class="panel">';
            //echo 'KEY INFO HERE';
        //echo '</div>';
        echo '</div>';
        echo '<script>
                var acc = document.getElementsByClassName("accordion");
                var i;
                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.display === "block") {
                            panel.style.display = "none";
                        } else {
                            panel.style.display = "block";
                        }
                    });
                }
            </script>';
		echo '<br/>'; 
		do_action('similar_listings');
		do_action('same_area');
	} else {
        body_comp('title');
        echo '<p style="text-align: center;">' . get_the_date( 'j F, Y' ) . '</p>';
		the_post_thumbnail();
		while ( have_posts() ) : the_post();
			the_content(); 
        endwhile;
        echo '<br/><p style="margin-top: 0;"><em>Chris Brosnan</em><br/><a target="_blank" href="https://twitter.com/cd_brosnan/">@cd_brosnan</a></p><br/>';
		body_comp('new_article_link');
	}

close_div();

get_footer(); 
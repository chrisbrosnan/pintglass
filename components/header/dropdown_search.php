<?php

$searchPage = home_url() . '/search/'; 
$searchForm .= '<form action="'.$searchPage.'" method="get">';
$searchForm .= '<input id="searchtext" type="text" name="s" placeholder="Search for..."/>';
$searchForm .= '<input id="searchbtn" type="submit" value="Search"/>';
$searchForm .= '</form><br/>';

echo '<div id="dropdown_search" class="hidden">';
    echo '<h4>SEARCH BY NAME</h4>';
    echo $searchForm;
    echo '<form action="'.$searchPage.'" method="get">';
    echo '<h4>FILTER LISTINGS</h4>';
    $path = get_template_directory_uri() . '/images/taxonomies/';
    $feat_terms = get_terms('features', array('post_type' => 'listing', 'hide_empty' => false));
    echo '<p style="margin-bottom: 15px;">Filter listings by FEATURE</p>';
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
    $area_terms = get_terms('area', array('post_type' => 'listing', 'hide_empty' => false));
    $init_path = get_template_directory_uri() . '/images/initials/';
    echo '<p style="margin-bottom: 15px; margin-top: 15px;">Filter listings by BOROUGH</p>';
    echo '<div style="text-align: left; margin-bottom: 1.2em;">';
	echo '<select id="searcharea" style="font-size: 1.5em;" name="area">'; 
    foreach($area_terms as $term){
		echo '<option style="font-size: 1.5em;" value='.$term->slug.'>'.$term->name.'</option>';
    }
	echo '</select>'; 
    echo '</div>';
    echo '<div style="text-align: center;"><input id="filtersubmit" type="reset" value="Reset" style="width: 50%; text-transform: uppercase; padding: 1em;"/>  <input id="filtersubmit" type="submit" value="Filter" style="width: 50%; text-transform: uppercase; padding: 1em;"/></div>';
    echo '</div>';
    echo '</form>';
echo '</div>';
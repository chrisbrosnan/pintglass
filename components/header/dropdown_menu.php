<?php

$home_link = home_url();

echo '<div id="dropdown_menu" style="overflow-y: scroll;" class="hidden">';
    echo '<h4>MENU</h4><br/>';
    $menuitems = array( 'About Pintglass', 'All listings', 'Blog', 'My feed', 'Contact', 'Privacy policy', 'Coming soon' );
	// To Add soon: 'My friends', 'Edit preferences', 'My favourites';
    foreach($menuitems as $item){
		$url = str_replace(' ', '-', $item);
		if($item == 'My feed'){
			echo '<a href="/activity/">' . $item . '</a><br/><br/><br/>';
		}else{
			echo '<a href="/'.strtolower($url).'">' . $item . '</a><br/><br/><br/>';
		}
    }
echo '</div>';
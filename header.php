<?php ?>

<!DOCTYPE html>
<html>
<head>
	
	<title><?php echo get_bloginfo ( 'name' ) . ' - ' . get_the_title(); //get_bloginfo ( 'description' ); ?></title>
    <?php wp_head(); ?>
	<style>
		#dropdown_search p { font-size: 1.5em; } 
		<?php if(wp_is_mobile()){ ?>
			.filt_span { font-size: 2.5em !important; }
			input[type=checkbox] { padding: 20px; margin-right: 10px; }
		<?php } ?>
		/*h4 { font-size: 1.5em; }*/
	</style>
    
</head>
<body style="<?php if(wp_is_mobile()){ ?>width: 100%;<?php } else { ?>width: 32%;<?php } ?>">
        
<?php 

border_open('header');

    head_comp('head_menu'); 
	echo '<div id="dropdowns">';
    	head_comp('dropdown_menu');
	    head_comp('dropdown_search');
    	head_comp('dropdown_profile');
	echo '</div>';
	
close_div();
	
border_open('main');

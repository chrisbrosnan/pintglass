<?php

get_header();

inner_open();

	body_comp('title');
	the_post_thumbnail();
	while ( have_posts() ) : the_post();
		the_content(); 
	endwhile;

close_div();

get_footer(); 
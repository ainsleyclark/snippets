<?php

	foreach($cat_manual as $cat) {

		$id = $cat->ID;
		$link = get_permalink($id);
		$main_title = get_the_title($id);
		$content = $cat->post_content;
		$excerpt = $cat->post_excerpt;
		$image = get_the_post_thumbnail_url( $id );
		$job_title = get_field('job_title', $id);
		$cat_auto = $block_style;	
		$cats = wp_get_post_categories($id);
		$term_title = "";
		$terms_string = "";
		$date_parsed = "";
		$date = get_the_date();

		$count = 0;

		foreach($cats as $cat) {
			
			if ($count >= 1) {
				$term_title .= ", ";
			}

			$term_title .= get_cat_name($cat);
			$count ++;
		};

		include( locate_template( 'views/components/blocks/sub-components/teaser-types/render-blocks/auto-cats-general.php', false, false ) ); 

	}; 
 
 ?>
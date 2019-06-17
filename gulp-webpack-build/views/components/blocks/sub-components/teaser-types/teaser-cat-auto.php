<?php

	
	$args = array(
		'post_type' => $cat_auto,
		'posts_per_page' => $num_items
	);
	
	$query = new WP_Query($args);

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {

			$query->the_post();
			$id = get_the_id();
			$link = get_permalink($id);
			$content = get_the_content();
			$excerpt = get_the_excerpt();
			$main_title = get_the_title($id);
			$image = get_the_post_thumbnail_url( $id );
			$job_title = get_field('job_title', $id);
			$card_type = get_field('card_type', $id);
			
			$tax = get_post_taxonomies($id);
		
			if($cat_auto == 'post') {
				$cat = "category";
			} else {
				if($tax) {
					$cat = $tax[0];
				} else {
					$tax = null;
				}
			}
			
			if($tax) {
				$terms_array = get_the_terms( $post->ID, $cat );
			
				$terms_string = "";
				
				$date_parsed = strtotime(get_the_date());
				$date = get_the_date();

				if($terms_array && $cat != 'staff-category') {
					foreach ( $terms_array as $term ) { 
						$terms_string .= $term->slug.' '; 
					}
				}
			}
			

			if($cat_auto == 'case-studies' || $cat_auto == "join-us") {

				$terms = get_post_taxonomies($id);

				if(isset($terms)) {
					$cats = get_the_terms($id, $terms[0]);

					foreach($cats as $cat) {
						$term_title = $cat->name;
					}
				}
			}	
			
			if($cat_auto == 'post') {
				
				$cats = wp_get_post_categories($id);
				$term_title = "";
				$count = 0;

				foreach($cats as $cat) {
					
					if ($count >= 1) {
						$term_title .= ", ";
					}

					$term_title .= get_cat_name($cat);
					$count ++;
				};
			}

			if($cat_auto != 'staff' && $block_type != 'carousel') { 
				include( locate_template( 'views/components/blocks/sub-components/teaser-types/render-blocks/auto-cats-general.php', false, false ) ); 
			}

			if($cat_auto == 'staff') {
				include( locate_template( 'views/components/blocks/sub-components/teaser-types/render-blocks/auto-cats-staff.php', false, false ) );
			}
			
			if($block_type == 'carousel') {
				include( locate_template( 'views/components/blocks/sub-components/teaser-types/render-blocks/auto-cats-carousel.php', false, false ) );
			}
			
			
		}
	}		

	wp_reset_postdata();
?>




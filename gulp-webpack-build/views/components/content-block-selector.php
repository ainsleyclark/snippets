<?php

if(!is_tax()):
	global $post;
	$page_id = $post->ID;
	$post_type = get_post_type($page_id);
	$post_slug = get_post_type($name);
else:
	$term_id = get_queried_object()->term_id;
	$queried_object = get_queried_object(); 
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;  
endif;

if(is_tax()):
	$id_val = $taxonomy . '_' . $term_id;
elseif(is_post_type_archive()):
	$id_val = 'cpt_'.$post_slug;
elseif(is_home()):
	$id_val = get_option('page_for_posts');
else:
	$id_val = "";
endif;

if (have_rows('content', $id_val)) {
	
	while (have_rows('content', $id_val)) {
		the_row();
		$layout = get_row_layout();
		
		switch ($layout) {
			case 'content_block':
				$mar_top = get_sub_field('margin_top');
				$mar_bottom = get_sub_field('margin_bottom');
				$padding_top = get_sub_field('padding_top');
				$padding_bottom = get_sub_field('padding_bottom');
				$use_vertical_height = get_sub_field('use_vertical_height');
				
				if($use_vertical_height) {
					$vheight = "min-height: " . get_sub_field('vertical_height') . "vh;";
				} else {
					$vheight = "";
				}
				
				$col = get_sub_field('colour_group');
				
				echo '<div style="margin-top:' . $mar_top . 'px;"></div>';
				include( locate_template( 'views/components/block-switcher.php', false, false ) );
				echo '<div class="marg-bot" style="margin-bottom:' . $mar_bottom . 'px;"></div>';
			
			break;
		};

	};
};

?>
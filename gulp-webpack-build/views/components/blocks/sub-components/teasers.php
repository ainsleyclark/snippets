<?php

	$teasers = get_sub_field('teasers');
	
	$teaser_type = $teasers['teaser_type'];
	$block_type = $teasers['block_type'];
	$num_cols = $teasers['number_of_columns'];
	$num_items = $teasers['num_items'];

	if($block_type == 'isotope-grid') {
		if(is_home() || is_post_type_archive('case-studies') || is_post_type_archive('join-us')) {
			$block_type = "isotope-grid";
			include( locate_template( 'views/components/utilities/blog-sort.php', false, false ) ); 
		}
	}
?>

<div class="row teaser-row <?php echo $block_type; ?>">

		<?php 
			switch($teaser_type) { 
				case 'category-manual':
					$cat_manual = $teasers['category_manual'];
					$block_style = $teasers['block_style'];
					include( locate_template( 'views/components/blocks/sub-components/teaser-types/teaser-cat-manual.php', false, false ) ); 
				
				break;
				case 'category-auto':
					$cat_auto = $teasers['category_auto'];
					
					include( locate_template( 'views/components/blocks/sub-components/teaser-types/teaser-cat-auto.php', false, false ) ); 
					
				break;
				case 'custom':
					$manual = $teasers['manual'];
					$block_style = $teasers['block_style'];
					include( locate_template( 'views/components/blocks/sub-components/teaser-types/teaser-manual.php', false, false ) ); 
					
				break;
			}; 
		?>
	
</div>

<?php
	// Show the job mailing list 
	
	if($cat_auto == 'join-us') {
		include( locate_template( 'views/components/utilities/forms/form-mailing-list.php', false, false ) ); 
	}
?>
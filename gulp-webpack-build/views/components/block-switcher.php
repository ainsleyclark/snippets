<?php

$content_type = get_sub_field('content_type');
$hide_block = get_sub_field('hide_block');

$is_header = false;
$case_study = false;
$block_type = false;
$cat_auto = false;

if($hide_block == 'show' || $hide_block == '' || $hide_block == null) {
	if($content_type != 'select'){
		
		switch($content_type) {
			case 'main-header':
				$is_header = true;
				include( locate_template( 'views/components/utilities/colours.php', false, false ) );
				include( locate_template( 'views/components/blocks/block-main-header.php', false, false ) );
			break;

			case 'text':
				include( locate_template( 'views/components/utilities/colours.php', false, false ) );	
				include( locate_template( 'views/components/blocks/block-text.php', false, false ) );
			break;
			
			case 'teasers':
				include( locate_template( 'views/components/utilities/colours.php', false, false ) );
				include( locate_template( 'views/components/blocks/block-teasers.php', false, false ) );
			break;

			case 'case-study':
				$case_study = true;
				include( locate_template( 'views/components/utilities/colours.php', false, false ) );
				include( locate_template( 'views/components/blocks/block-case-study.php', false, false ) );
			break;
			
			case 'form':
				include( locate_template( 'views/components/utilities/colours.php', false, false ) );
				include( locate_template( 'views/components/blocks/block-forms.php', false, false ) );
			break;
			
			case 'text-carousel':
				include( locate_template( 'views/components/utilities/colours.php', false, false ) );
				include( locate_template( 'views/components/blocks/block-text-carousel.php', false, false ) );
			break;
		};
	};
};
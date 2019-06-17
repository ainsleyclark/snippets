<?php



if($hide_sub_block == 'show' || $hide_sub_lock == '' || $hide_sub_block == null) {
	if($block_type != 'select') {
		switch($block_type) {
			case "text-content":
				include( locate_template( 'views/components/blocks/sub-components/sub-blocks/sub-block-text.php', false, false ) );
			break;

			case "logo-strip":
				include( locate_template( 'views/components/blocks/sub-components/sub-blocks/sub-block-logo-strip.php', false, false ) );
			break;
		};
	};
};


?>
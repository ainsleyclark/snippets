<?php


$sub_blocks = $text_block['block'];

if($sub_blocks) {

	foreach ($sub_blocks as $sub_block) {

		$layout = $sub_block['acf_fc_layout'];

		switch ($layout) {
			case 'block_types':
			
				$margin_top = $sub_block['margin_top'];
				$margin_bottom = $sub_block['margin_bottom'];

				$block_type = $sub_block['block_type'];
				$hide_sub_block = $sub_block['show_hide_block'];
				$t_block = $sub_block['text_content'];
				$logo_strip = $sub_block['logo_strip'];

				include( locate_template( 'views/components/blocks/sub-components/sub-block-switcher.php', false, false ) );

			break;
		};

	};
}

?>
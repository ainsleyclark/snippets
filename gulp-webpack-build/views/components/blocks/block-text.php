<?php

$block = get_sub_field('text_block');

$show_hide = $block['showhide_title'];
$title = $block['title'];
$title_tag = $block['title_tag'];
$title_type = $block['title_type'];

$text_block = get_sub_field('text_block');


?>

<section class="container-fluid min-height text-blocks <?php echo $bg_colour; ?> <?php echo $text_colour; ?>" style="padding-top:<?php echo $padding_top; ?>px; padding-bottom:<?php echo $padding_bottom; ?>px; <?php echo $vheight; ?>">
	
	<?php include( locate_template( 'views/components/shape-overlay-selector.php', false, false ) ); ?>
	
	<?php if($bg_colour != 'select') { ?>
		<div class="overlay"></div>
	<?php } ?>
	
	<div class="row over">

		<?php 
			if($show_hide) {
				include( locate_template( 'views/components/utilities/title.php', false, false ) );
			}
			include( locate_template( 'views/components/sub-block-selector.php', false, false ) ); 
		?>
			
	</div>
	
</section>
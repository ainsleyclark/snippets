
<?php

$block = get_sub_field('teasers');

$title = $block['title'];
$title_tag = $block['title_tag'];
$title_type = $block['title_type'];

$post_type = get_post_type();

?>

<section class="container-fluid min-height teasers <?php echo $bg_colour; ?> <?php echo $text_colour; ?>" style="padding-top:<?php echo $padding_top; ?>px; padding-bottom:<?php echo $padding_bottom; ?>px; <?php echo $vheight; ?>">
	
	<?php include( locate_template( 'views/components/shape-overlay-selector.php', false, false ) ); ?>
	
	<div class="row over">
		<div class="container teaser-inner">

			<?php include( locate_template( 'views/components/utilities/title.php', false, false ) ); ?>
			<div class="teaser-padding"></div>
			<?php include( locate_template( 'views/components/blocks/sub-components/teasers.php', false, false ) ); ?>
			
		</div>
	</div>
</section>
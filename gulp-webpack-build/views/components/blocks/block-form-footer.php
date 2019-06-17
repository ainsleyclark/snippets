<?php
	
	$block_type = null;

	$form = get_field('form', 'options');
	$title = $form['title'];
	$title_tag = $form['title_tag'];
	$title_type = $form['title_type'];

	$padding_top = $form['padding_top'];
	$padding_bottom = $form['padding_bottom'];
	$use_vertical_height = $form['use_vertical_height'];
	if($use_vertical_height) {
		$vheight = "min-height: " . $form['vertical_height'] . "vh;";
	} else {
		$vheight = "";
	}
	
	$col = $form['colours'];
	
	include( locate_template( 'views/components/utilities/colours.php', false, false ) );
?>

<section class="container-fluid forms <?php echo $bg_colour; ?>" style="padding-top:<?php echo $padding_top; ?>px; padding-bottom:<?php echo $padding_bottom; ?>px; background:<?php //echo $bg_color; ?> <?php echo $vheight; ?>">
	
	<?php include( locate_template( 'views/components/utilities/shape-overlays/form-shapes.php', false, false ) ); ?>

	<div class="row over">
		<?php 
			$block = $form;
			
			include( locate_template( 'views/components/utilities/title.php', false, false ) ); 
			
			
			if(is_singular($post_types = "join-us")) {
				include( locate_template( 'views/components/utilities/forms/form-jobs.php', false, false ) );
			} else {
				include( locate_template( 'views/components/utilities/forms/form-general.php', false, false ) ); 
			}
			
		?>
		
	</div>
</section>
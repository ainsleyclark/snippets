<?php

	$form = get_sub_field('forms');
	
	$form_type = $form['form_type'];
	$title = $form['title'];
	$title_tag = $form['title_tag'];
	$title_type = $form['title_type'];
	
?>

<section class="container-fluid forms hhh <?php echo $bg_colour; ?>" style="padding-top:<?php echo $padding_top; ?>px; padding-bottom:<?php echo $padding_bottom; ?>px; background:<?php //echo $bg_color; ?> <?php echo $vheight; ?>">
	
	<?php include( locate_template( 'views/components/utilities/shape-overlays/form-shapes.php', false, false ) ); ?>

	<div class="row over">
		<?php 
			$block = $form;
			include( locate_template( 'views/components/utilities/title.php', false, false ) ); 
			
			if($form_type == 'general') {
				include( locate_template( 'views/components/utilities/forms/form-general.php', false, false ) ); 
			}
			
			if($form_type = 'jobs') {
				include( locate_template( 'views/components/utilities/forms/form-jobs.php', false, false ) ); 
			}
		?>
	</div>
</section>
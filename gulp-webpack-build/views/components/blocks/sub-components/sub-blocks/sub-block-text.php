<?php

$centered = false;
$full_width = false;

$split_type = $t_block['split_type'];
$full_width_type = $t_block['full_width_type'];

$left_col = $t_block['left_col'];
$right_col = $t_block['right_col'];

$left_col_text = $t_block['left_col_text'];
$left_col_img = $t_block['left_col_img'];

$right_col_text = $t_block['right_col_text'];
$right_col_img = $t_block['right_col_img'];

$full_width_text = $t_block['full_width_text'];
$full_width_img = $t_block['full_width_img'];

// Left text

$left_text = $left_col_text['left_content'];
$left_add_button = $left_col_text['add_button'];
$left_add_contact = $left_col_text['add_contact'];
$left_contact_info = $left_col_text['contact_info'];

// Left images

$left_img_type = $left_col_img['image_type'];
$left_img = $left_col_img['image'];
$left_img_preset = $left_col_img['image_select'];
$left_img_width = $left_col_img['image_width'];

// Right text

$right_text = $right_col_text['right_content'];
$right_add_button = $right_col_text['add_button'];
$right_add_contact = $right_col_text['add_contact'];
$right_contact_info = $right_col_text['contact_info'];

// Right images

$right_img_type = $right_col_img['image_type'];
$right_img = $right_col_img['image'];
$right_img_preset = $right_col_img['image_select'];
$right_img_width = $right_col_img['image_width'];

// Full text

$full_text = $full_width_text['full_width_content'];
$full_add_button = $full_width_text['add_button'];
$full_img = $full_width_img['full_width_image'];

// Colours

$text_colour = $t_block['text_colour_group'];
$text_colour = $text_colour['text_colour'];


 

switch($split_type) {
	case 'text-left-img-right':
		$left_col_class = 'col-md-6 col-lg-' . $left_col;
		$right_col_class = 'col-md-6 col-lg-' . $right_col;
	break;
	case 'text-left-img-left':
		$left_col_class = 'col-md-6 col-lg-' . $left_col;
		$right_col_class = 'col-md-6 col-lg-' . $right_col;
	break;
	case 'two-col-text':
		$left_col_class = 'col-md-6 col-lg-' . $left_col;
		$right_col_class = 'col-md-6 col-lg-' . $right_col;
	break;

	case 'full-width-text':

		$full_width = true;

		switch($full_width_type) {
			case 'full':

			break;
			case 'centred';
				$centered = true;
			break;
		};

	break;
	case 'full-width-image':
		$full_width = true;
	break;
};

if(!$text_colour){
	$text_colour = "";
}

?>

<div class="container">
	<div style="margin-top:<?php echo $margin_top; ?>px"></div>
	<div class="row">
		<?php if ($full_width) { 
				if($centered) { ?>

					<div class="col-lg-2"></div>

					<div class="col-lg-8 centered">
						<div class="centered-content">
							<?php if($full_text) { ?>

								<article class="main-content">
									<div class="<?php echo $text_colour; ?>">
										<?php echo $full_text; ?>
									</div>

									<?php 
											if($full_add_button) {
												$button = $full_width_text['button'];
												include( locate_template( 'views/components/utilities/buttons.php', false, false ) ); 
											}
									?>
									
									

								</article>

							<?php } ?>
						</div>
					</div>

					<div class="col-lg-2"></div>

				<?php } else { ?>

					<div class="col">

						<?php if($full_text) { ?>

								<article class="main-content">
									<div class="<?php echo $text_colour; ?>">
										<?php echo $full_text; ?>
									</div>

									<?php 
											if($full_add_button) {
												$button = $full_width_text['button'];
												include( locate_template( 'views/components/utilities/buttons.php', false, false ) ); 
											}
									?>

								</article>

						<?php } elseif($full_img) { ?>

								<figure class="image">
									<img data-src="<?php echo $full_img['url']; ?>" alt="" class="lazy-img img-respond">
									
									<noscript>
										<img src="<?php echo $full_img['url']; ?>" alt="" class="img-respond">
									</noscript>
								
								</figure>

						<?php }; ?>

					</div>

				<?php };
			} else { ?>

			<div class="<?php echo $left_col_class; ?> insert">
				
				<?php if($left_text) { ?>

						<article class="main-content">
							<div class="<?php echo $text_colour; ?>">
								<?php echo $left_text; ?>
							</div>

							<?php 
									if($left_add_button) {
										$button = $left_col_text['button'];
										include( locate_template( 'views/components/utilities/buttons.php', false, false ) ); 
									}
						
									if($left_add_contact) {
										$contact_info = $left_contact_info;
										include( locate_template( 'views/components/utilities/contact-text.php', false, false ) ); 
									}
							?>
						</article>

				<?php } elseif($left_img || $left_img_preset) { ?>
						<figure class="image">
							<?php if($left_img_type == 'preset') { ?>
								<?php if($left_img_preset) { ?>
									<div class="img-preset">
										<img data-src="<?php echo get_template_directory_uri() . '/build/images/shapes/inline/' . $left_img_preset . '.svg'; ?>" alt="" class="lazy-img img-respond" style="width:<?php echo $left_img_width; ?>%">
									
										<noscript>
											<img src="<?php echo get_template_directory_uri() . '/build/images/shapes/inline/' . $left_img_preset . '.svg'; ?>" alt="" class="img-respond" style="width:<?php echo $left_img_width; ?>%">
										</noscript>
									</div>
								<?php } ?>
							<?php } 
							
							if($left_img_type == 'custom') { ?>
									<img data-src="<?php echo $left_img['url']; ?>" alt="" class="lazy img-respond">
									
									<noscript>
										<img src="<?php echo $left_img['url']; ?>" alt="" class="img-respond">
									</noscript>
							<?php } ?>
						</figure>
				<?php }; ?>

			</div>

			<div class="<?php echo $right_col_class; ?> insert">

				<?php if($right_text) { ?>

						<article class="main-content">
							<div class="<?php echo $text_colour; ?>">
								<?php echo $right_text; ?>
							</div>

							<?php 
									if($right_add_button) {
										$button = $right_col_text['button'];
										include( locate_template( 'views/components/utilities/buttons.php', false, false ) ); 
									}
									
									if($right_add_contact) {
										$contact_info = $right_contact_info;
										include( locate_template( 'views/components/utilities/contact-text.php', false, false ) ); 
									}
							?>
							
						</article>

				<?php } elseif($right_img || $right_img_preset) { ?>

						<figure class="image">
							<?php if($right_img_type == 'preset') { ?>
								<?php if($right_img_preset) { ?>
									<div class="img-preset">
										<img data-src="<?php echo get_template_directory_uri() . '/build/images/shapes/inline/' . $right_img_preset . '.svg'; ?>" alt="" class="lazy-img img-respond" style="width:<?php echo $right_img_width; ?>%">
										
										<noscript>
											<img src="<?php echo get_template_directory_uri() . '/build/images/shapes/inline/' . $right_img_preset . '.svg'; ?>" alt="" class="img-respond" style="width:<?php echo $right_img_width; ?>%">
										</noscript>
									
									</div>
								<?php  } ?>
								<?php } 
							
								if($left_img_type == 'custom') { ?>
									<img data-src="<?php echo $right_img['url']; ?>" alt="" class="lazy img-respond">
									
									<noscript>
										<img data-src="<?php echo $right_img['url']; ?>" alt="" class="img-respond">
									</noscript>
									
								<?php } ?>
						</figure>

				<?php }; ?>

			</div>

		<?php }; ?>
		
	</div>
	<div style="margin-bottom:<?php echo $margin_bottom; ?>px"></div>
</div>




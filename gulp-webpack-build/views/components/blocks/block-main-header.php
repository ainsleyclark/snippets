<?php

$header = get_sub_field('main_header');
$text = $header['text'];
$sub_text_options = $header['sub_text_options'];
$sub_text = $header['sub_text'];
$sub_text_colour = $sub_text_options['text_colour'];
$sub_text_size = $sub_text_options['sub_text_size'];
$add_button = $header['add_button'];



?>

<section class="container-fluid main-hero <?php echo $bg_colour; ?>" style="padding-top:<?php echo $padding_top; ?>px; padding-bottom:<?php echo $padding_bottom; ?>px; background:<?php //echo $bg_color; ?> <?php echo $vheight; ?>">

	<div class="main-hero overlay"></div>

	<?php include( locate_template( 'views/components/utilities/shape-overlays/hero-shapes.php', false, false ) );  ?>

	<div class="row header-text">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 main-header">
					<header>
						<h1 class="<?php echo $text_colour; ?>"><?php echo $text; ?></h1>

						<?php if($sub_text) { ?>
							<<?php echo $sub_text_size; ?> class="<?php echo $sub_text_colour; ?>"><?php echo $sub_text; ?></<?php echo $sub_text_size; ?>>
						<?php } ?>

					</header>
					<p>&nbsp;</p>
					<?php 
						if($add_button) {
							$button = $header['button'];
							include( locate_template( 'views/components/utilities/buttons.php', false, false ) ); 
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php //include( locate_template( 'views/components/utilities/random-shapes.php', false, false ) );  ?> 




<?php
	$img_preset = null;
	$img_type = null;
	$img_type = $block['image_type'];
	
	
	if($img_type != 'none') {
		$img = $block['image'];
		$img_preset = $block['image_select'];
		$img_width = $block['image_width'];
	}

	
?>



<?php if($block_type != 'carousel') { ?>
	<?php if($title) { ?>

		<?php if($title_type == 'half-width') { ?>
			
			<div class="container">
			
				<div class="row">
					
					<div class="col-lg-6">
						
						<header>
							<<?php echo $title_tag; ?>>
								<?php echo $title; ?>
							</<?php echo $title_tag; ?>>
						</header>

					</div>
					
					<div class="col-lg-6">
						<figure class="image">
							<?php if($img_type == 'preset' && $img_type != 'none') { ?>
								<?php if($img_preset) { ?>
									<div class="img-preset">
										<img src="<?php echo get_template_directory_uri() . '/build/images/shapes/inline/' . $img_preset . '.svg'; ?>" alt="" class="img-respond" style="width:<?php echo $img_width; ?>%">
									</div>
								<?php } ?>
							<?php } ?>
							<?php if($img_type == 'custom') { ?>
									<img data-src="<?php echo $img['url']; ?>" alt="" class="laz-imgy img-respond">
									
									<noscript>
										<img src="<?php echo $img['url']; ?>" alt="" class="img-respond">
									</noscript>
							<?php } ?>
						</figure>
					</div>
					
				</div>
			</div>
			
		<?php } else { ?>
			
			<div class="container">
			
				<div class="row">
				
					<div class="col">
						
						<header>
							<<?php echo $title_tag; ?>>
								<?php echo $title; ?>
							</<?php echo $title_tag; ?>>
						</header>

					</div>
				
				</div>
				
			</div>
			
		<?php } ?>
		
	
	<?php }; ?>

<?php } ?>

<?php if($block_type == 'carousel') { ?>
	<header>
		<<?php echo $title_tag; ?>>
			<?php echo $title; ?>
		</<?php echo $title_tag; ?>>
	</header>
<?php } ?>


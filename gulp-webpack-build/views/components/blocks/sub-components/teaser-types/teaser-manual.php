<?php

	foreach($manual as $teaser) {

		$main_title = $teaser['title'];
		$text = $teaser['text'];
		$main_image = $teaser['image'];
		$image = $main_image['url'];
		$button = $teaser['button'];
		
?>
		<article class="col-md-6 col-lg-<?php echo $num_cols; ?> teaser-<?php echo $block_style; ?> item  ">

			
				<div class="inner">
				
					<?php if($image) { ?>
						<figure>
							<img data-src="<?php echo $image; ?>" class="lazy-img img-respond" alt="<?php echo $main_title; ?>" />
							
							<noscript>
								<img src="<?php echo $image; ?>" class="img-respond" alt="<?php echo $main_title; ?>" />
							</noscript>
						
						</figure>
					<?php }; ?>

					<header>
						<h3><?php echo $main_title; ?></h3>
					</header>

					<div class="text-content">
						<?php echo $text; ?>
					</div>
					
					<div class="btn-centred">
						<?php 
						if($button) {
							include( locate_template( 'views/components/utilities/buttons.php', false, false ) ); 
						}
					?>
					</div>
				</div>
			
			
		</article>
<?php
	}
?>


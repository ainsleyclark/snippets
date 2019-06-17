<?php if($card_type == 1) { ?>

	<article class="col-md-6 col-lg-6 col-xl-<?php echo $num_cols; ?> teaser-<?php echo $cat_auto; ?> staff-type-<?php echo $card_type; ?> item">
		
			<div class="inner">
				
				<div class="inner-first">
					<div class="lazy inner-second" data-bg="url(<?php echo $image; ?>)">
						
						<div class="job-title">
							<p><?php echo $job_title; ?></p>
						</div>

						<div class="bottom-frame">

							<header>
								<?php
									$main_title_array = explode(' ', $main_title);
									echo '<div class="small-title">' . $main_title_array[0] . "</div>";
									unset($main_title_array[0]);
									$main_title_remainder = implode(' ', $main_title_array);
									echo '<div class="large-title">' . $main_title_remainder . '</div>';
								?>
							</header>
						</div>

					</div>
					
				</div>
				
			</div>
		
	</article>

<?php } ?>

<?php if($card_type == 2) { ?>

	<article class="col-md-6 col-lg-6 col-xl-<?php echo $num_cols; ?> teaser-<?php echo $cat_auto; ?> staff-type-<?php echo $card_type; ?> item">
		
			<div class="inner">
			
					<div class="inner-first">
						<div class="job-title">
							<p><?php echo $job_title; ?></p>
						</div>

						<div class="inner-second">
								
							<div class="lazy inner-third" data-bg="url(<?php echo $image; ?>)">
								<div class="name-top">
									<?php echo $main_title; ?>
								</div>
							</div>
						</div>

					</div>
				
			</div>
		
	</article>


<?php } ?>

<?php if($card_type == 3) { ?>

	<article class="col-md-6 col-lg-6 col-xl-<?php echo $num_cols; ?> staff-type-<?php echo $card_type; ?> item">

		<div class="inner">
			
				<?php if($image) { ?>
					<figure class="lazy cs-image" data-bg="url(<?php echo $image; ?>)">
						<!-- <img data-src="<?php echo $image; ?>" class="lazy-img img-respond" alt="<?php echo $main_title; ?>" /> -->
						
						<!-- <noscript>
							<img src="<?php echo $image; ?>" class="img-respond" alt="<?php echo $main_title; ?>" />
						</noscript> -->
					
					</figure>
				<?php }; ?>
			
		
			<div class="text-content">

				<header>
					<h3><?php echo $main_title; ?></h3>
					<p><?php echo $job_title; ?></p>
				</header>
			</div>
			
		</div>
			
	</article>

<?php } ?>
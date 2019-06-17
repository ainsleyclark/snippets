<article class="col-md-6 col-lg-6 col-xl-<?php echo $num_cols; ?> teaser-<?php echo $block_style; ?> <?php echo $terms_string; ?>item" data-date="<?php echo $date_parsed; ?>" data-category="<?php echo $terms_string; ?>">
	
	<?php if($block_style== 'post' ) { ?>
		<div class="lazy inner inner-post" data-bg="url('<?php echo $image; ?>')">
			<div class="overlay"></div>
	<?php } else { ?>
			<div class="inner">

			<?php if($image && $block_style== 'case-studies') { ?>
				<figure class="cs-image">
					<img data-src="<?php echo $image; ?>" class="lazy-img img-respond" alt="<?php echo $main_title; ?>" />
				
					<noscript>
						<img src="<?php echo $image; ?>" class="img-respond" alt="<?php echo $main_title; ?>" />
					</noscript>
				</figure>
			<?php }; ?>
			
	<?php } ?>
		
		<div class="text-content">

			<header>
				<?php if($block_style == "join-us" || $block_style == 'post') { ?>
					<span class="uppercase role"><?php echo $term_title; ?></span>
				<?php }; ?>
				
				<h3><?php echo $main_title; ?></h3>
				
				<?php if($block_style== 'post' || $block_style =='news') { ?>
					<div class="tiny">
						<?php echo $date; ?>	
					</div>
				<?php } ?>
				
				<?php if ($job_title) { ?>
					<p><?php echo $job_title; ?></p>
				<?php } ?>

			</header>
	
			<div class="generic-text">
				<?php if($excerpt) { ?>
					<?php echo $excerpt; ?>
				<?php } else { ?>
					<?php echo getFirstPara($content); ?>
				<?php } ?>
			</div>
			
			<?php if($block_style == "join-us") {  ?>
				<div class="btn-centred">
					<a href="<?php echo $link; ?>" class="btn btn-light-gray btn-small">Find Out More</a>
				</div>
			<?php } ?>
			
			<?php if($block_style == "case-studies") {  ?>
				<div class="btn-centred">
					<a href="<?php echo $link; ?>" class="btn btn-light-gray btn-small">Read The Case Study</a>
				</div>
			<?php } ?>
			
			
				
		</div>
		
		<?php if ($block_style == 'post') { ?>
			<div class="button-float">
				<div class="btn-centred">
					<a href="<?php echo $link; ?>" class="btn btn-light-gray btn-small">Read The Post</a>
				</div>
			</div>
		<?php } ?>
		
		
			
	</div>

</article>
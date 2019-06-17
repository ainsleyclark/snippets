
<article class="stack-item stacked <?php //echo $slide_class; ?>">
	
		<div class="inner">

			<figure>
					<img src="<?php echo $image; ?>" class="img-respond" alt="<?php echo $main_title; ?>" />
			</figure>
		
			<div class="text-content">

				<header>
					<h3 class="card-title"><?php echo $main_title; ?></h3>
				</header>
		
				<div class="generic-text">
					<?php if($excerpt) { ?>
						<?php if ($cat_auto != 'post') { ?>
							<?php echo $excerpt; ?>
						<?php } ?>
					<?php } else { ?>
						<?php echo $excerpt; ?>
					<?php } ?>
				</div>
				
				
				
			</div>
		</div>
		
		<?php if($cat_auto == "join-us") {  ?>
			<div class="btn-centred pos-ab">
				<a href="<?php echo $link; ?>" class="btn btn-light-gray btn-small">Find Out More</a>
			</div>
		<?php } ?>
		
		<?php if($cat_auto == "case-studies") {  ?>
			<div class="btn-centred pos-ab">
				<a href="<?php echo $link; ?>" class="btn btn-light-gray btn-small">Read The Case Study</a>
			</div>
		<?php } ?>
	
</article>
<div class="prev-next">
	<?php
		$prev_post = get_previous_post();
		
		if($prev_post) {
	?>  
			<div class="prev">
				<a href="<?php echo get_permalink($prev_post->ID); ?>">
					<i class="fas fa-chevron-left"></i> Previous
				</a>
			</div>
	<?php
		} else {
	?>
			<div class="prev text-light-gray">
				<i class="fas fa-chevron-left"></i> Previous
			</div>
	<?php
		}

		$next_post = get_next_post();
		if($next_post){
	?>
			<div class="next">
				<a href="<?php echo get_permalink($next_post->ID); ?>">
					Next <i class="fas fa-chevron-right"></i> 
				</a>
			</div>
	<?php	
		} else {
	?>
			<div class="next text-light-gray">
				Next <i class="fas fa-chevron-right"></i> 
			</div>
	<?php
		}
	?>
	
</div>

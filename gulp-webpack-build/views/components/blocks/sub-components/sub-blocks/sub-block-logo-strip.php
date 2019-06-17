<?php

$title = $logo_strip['title'];
$num_cols = $logo_strip['number_of_columns'];
$logo_rep = $logo_strip['logos'];


?>
<div class="container">
<div class="row logo-strip-outer">
	
	<?php
		foreach($logo_rep as $item) {
			$logo = $item['logo'];
			$logo_text = $item['logo_text'];
	?>	
			<div class="<?php echo $num_cols; ?> logo-strip">
			
				<div class="image">
					<img data-src="<?php echo $logo['url']; ?>" class="lazy-img img-respond">
					
					<noscript>
						<img src="<?php echo $logo['url']; ?>" class="img-respond">
					</noscript>
				</div>
				
				<div class="logo-text tiny text-center text-dark-gray">
					<?php echo $logo_text; ?>
				</div>
				
			</div>

	<?php } ?>

</div>
</div>

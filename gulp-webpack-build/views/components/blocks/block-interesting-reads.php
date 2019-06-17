<?php 
	$reads = get_field('select_interesting_reads');
	
	// var_dump($reads);
?>

<?php if($reads) { ?>
	<div class="teasers">
		<div class="row">
			<div class="container interesting-reads">
				<div class="row">
					<header>
						<h2>Interesting Reads</h2>
					</header>
				</div>
				<div class="row teaser-row normal">
					
					<?php 
						$block_style = 'news';
						$cat_manual = $reads;
						$num_cols = 3;
						include( locate_template( 'views/components/blocks/sub-components/teaser-types/teaser-cat-manual.php', false, false ) ); 
					?>
				</div>

			</div>
		</div>
	</div>
<?php } ?>

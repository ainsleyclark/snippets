<?php


$block = get_sub_field('post_card');

$title = $block['title'];
$title_tag = $block['title_tag'];
$title_type = $block['title_type'];

$header_image = $block['header_image'];

$text_block = get_sub_field('post_card');
$case_study = true;

$post_type = get_post_type();


$cat_links = null;
$author_id = null;

if($post_type == 'post') {
	$title = get_the_title();
	$title_tag = "h1";
	
	$post = get_post();
	
	$author_id = $post->post_author;
	
	if ( $post ) {
		$id = $post->ID;
		$categories = get_the_category( $id );
		
		foreach($categories as $cat) {
			$link = get_category_link( $cat->term_id );
			$cat_title = $cat->cat_name;
    
			$cat_links .= ' <a href="'.$link.'" class="cat-link">'.$cat_title.'</a> ';
		}
	}
}

if(!$text_colour) {
	$text_colour = "";
}


?>

<section class="container-fluid case-study <?php echo $bg_colour; ?> <?php echo $text_colour; ?>" style="padding-top:<?php echo $padding_top; ?>px; padding-bottom:<?php echo $padding_bottom; ?>px;">
	<?php include( locate_template( 'views/components/shape-overlay-selector.php', false, false ) ); ?>
	<div class="row over">
		<div class="container post-block">
			<div class="row">
				<div class="col-lg-1"></div>
				
				<div class="col-lg-10 case-study-internal">
					
					<div class="inner-drop-shadow">
		
						<?php if($header_image) { ?>
							<div class="header-image" style="background:url('<?php echo $header_image['url']; ?>') no-repeat center center; background-size:cover;">
						<?php } else { ?>
							<div class="featured-image">
						<?php } ?>
						
							<img src="<?php echo get_template_directory_uri(); ?>/build/images/placeholders/blog-placeholder.png" class="img-respond header-image" />
							<div class="overlay"></div>
							
							<div class="title">
								<header>
									
									<?php if($cat_links) { ?>
										<div class="cat-links">
											<?php echo $cat_links; ?>	
										</div>
									<?php } ?>
									
									<<?php echo $title_tag; ?>>
										<?php echo $title; ?>
									</<?php echo $title_tag; ?>>	
									
									<?php if ( $post_type == 'post' ) { ?>
										<div class="author">
											Posted by <span class="bold"><?php the_author_meta( 'user_nicename', $author_id ); ?></span>	
										</div>
									<?php } ?>
									
								</header>
							</div>
							
						</div>
					
		
						<div class="row">
							<div class="inner">
								<div class="row"">
									<div class="col-1 col-lg-2"></div>
										<div class="col-10 col-lg-8">
										
											<?php if ( $post_type == 'post' ) { ?>
												<div class="last-updated">
													Last updated <span class="bold"><?php echo get_the_date(); ?></span>
												</div>
											<?php } ?>
											
											<?php 
												include( locate_template( 'views/components/sub-block-selector.php', false, false ) ); 
											?>
											
											<?php if ( $post_type == 'post' ) { ?>
												<div class="author">
													Posted by <span class="bold"><?php the_author_meta( 'user_nicename', $author_id ); ?></span>	
												</div>
											<?php } ?>
											
											<?php if ( $post_type == 'post' ) { 
												include( locate_template( 'views/components/utilities/prev-next.php', false, false ) ); 
											} ?>
											
										</div>
									<div class="col-1 col-lg-2"></div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
				<div class="col-lg-1"></div>
				
			</div>
		</div>
	</div>
</section>
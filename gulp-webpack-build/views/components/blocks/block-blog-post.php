<?php

$post = get_post();
$id = $post->ID;
$cat_links = null;
$author_id = null;


$title = get_the_title($id);

$author_id = $post->post_author;



$categories = get_the_category( $id );

foreach($categories as $cat) {
	$link = get_category_link( $cat->term_id );
	$cat_title = $cat->cat_name;

	//$cat_links .= ' <a href="'.$link.'" class="cat-link">'.$cat_title.'</a> ';
	$cat_links .= $cat_title . ' ';
}


$header_image = get_the_post_thumbnail_url($id);





?>

<section class="container-fluid case-study blog-main">
	<?php include( locate_template( 'views/components/utilities/shape-overlays/blog-overlay.php', false, false ) ); ?>
	
	<div class="row over ">
		<div class="container post-block">
			<div class="row">
				<div class="col-lg-1"></div>
				
				<div class="col-lg-10 case-study-internal">
					
					<div class="inner-drop-shadow">
		
						
							<div class="header-image" style="background:url('<?php echo $header_image; ?>') no-repeat center center; background-size:cover;">
						
							<img src="<?php echo get_template_directory_uri(); ?>/build/images/placeholders/blog-placeholder.png" class="img-respond header-image" />
							
							<div class="overlay"></div>
							
							<div class="title">
								<header>
									
									<?php if($cat_links) { ?>
										<div class="cat-links">
											<?php echo $cat_links; ?>	
										</div>
									<?php } ?>
									
									<h1 class="text-center blog-header-main">
										<?php echo $title; ?>
									</h1>	
									
									
										<div class="author">
											Posted by <span class="bold"><?php the_author_meta( 'user_nicename', $author_id ); ?></span>	
										</div>
									
									
								</header>
							</div>
							
						</div>
					
		
						<div class="row">
							<div class="inner">
								<div class="row"">
									<div class="col-1 col-lg-2"></div>
										<div class="col-10 col-lg-8">
										
											
											<div class="last-updated">
												Last updated <span class="bold"><?php echo get_the_date(); ?></span>
											</div>
											
											
											<div class="content">
												<?php 
												echo apply_filters('the_content', $post->post_content);
												
												//echo $post->post_content; ?>
											</div> 
											
											
											<div class="blog-author">
												Posted by <span class="bold"><?php the_author_meta( 'user_nicename', $author_id ); ?></span>
											</div>
											
											
											<?php 
												include( locate_template( 'views/components/utilities/prev-next.php', false, false ) ); 
											?>
											
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
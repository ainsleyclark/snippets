<?php
	
	$carousel = get_sub_field('text_carousel');
	
	
	$left_section = $carousel['left_content'];
	
	$left_text = $left_section['left_column_text'];
	
	$right_section = $carousel['right_content'];
	$images = $right_section['images'];
	$carousel_type = $right_section['carousel_type'];
	
	$teasers = $right_section['teasers'];
	
	$teaser_type = $teasers['teaser_type'];
	
	$num_items = $teasers['num_items'];
	$cat_auto = $teasers['category_auto'];
	
	
	$show_hide = $left_section['showhide_title'];
	$title = $left_section['title'];
	$title_tag = $left_section['title_tag'];
	$title_type = $left_section['title_type'];

?>





<section class="carousel d-flex align-items-center <?php echo $bg_colour; ?> <?php echo $text_colour; ?>" style="padding-top:<?php echo $padding_top; ?>px; padding-bottom:<?php echo $padding_bottom; ?>px; <?php echo $vheight; ?>">

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="inner">
					
					<header>
						<<?php echo $title_tag; ?>>
							<?php echo $title; ?>
						</<?php echo $title_tag; ?>>
					</header>
					
                    <div>
                        <?php echo $left_text; ?>
					</div>
					
                </div>
			</div>
			
            <div class="col-12 col-lg-6">
				<div class="stack-nav">
					<div class="row">
						
						<div class="col">
							<span class="fa-stack fa-2x" id="next">
								<i class="fas fa-circle fa-stack-2x text-white"></i>
								<i class="fas fa-chevron-left fa-stack-1x text-light-gray"></i>
							</span>
						</div>
						<div class="col text-right">
							<span class="fa-stack fa-2x" id="prev">
								<i class="fas fa-circle fa-stack-2x text-white"></i>
								<i class="fas fa-chevron-right fa-stack-1x text-light-gray""></i>
							</span>
						</div>
					</div>
					
					
					
				</div>
                <div class="stack-slider">
                    <div class="stack-track">
						<?php
							$args = array(
								'post_type' => $cat_auto,
								'posts_per_page' => $num_items
							);
							
							$query = new WP_Query($args);
							$slide_count = 1;
							$slide_class = "";
							
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {

									$query->the_post();
									$id = get_the_id();
									$link = get_permalink($id);
									$content = get_the_content();
									$excerpt = get_the_excerpt();
									$main_title = get_the_title($id);
									$image = get_the_post_thumbnail_url( $id );
									$job_title = get_field('job_title', $id);
									$card_type = get_field('card_type', $id);
						
									
									$tax = get_post_taxonomies($id);
								
									if($cat_auto == 'post') {
										$cat = "category";
									} else {
										if($tax) {
											$cat = $tax[0];
										} else {
											$tax = null;
										}
									}
									
									if($tax) {
										$terms_array = get_the_terms( $post->ID, $cat );
									
										$terms_string = "";
										
										$date_parsed = strtotime(get_the_date());
										$date = get_the_date();

										if($terms_array && $cat != 'staff-category') {
											foreach ( $terms_array as $term ) { 
												$terms_string .= $term->slug.' '; 
											}
										}
									}
									

									if($cat_auto == 'case-studies' || $cat_auto == "join-us") {

										$terms = get_post_taxonomies($id);

										if(isset($terms)) {
											$cats = get_the_terms($id, $terms[0]);

											foreach($cats as $cat) {
												$term_title = $cat->name;
											}
										}
									}	
									
									if($cat_auto == 'post') {
										
										$cats = wp_get_post_categories($id);
										$term_title = "";
										$count = 0;

										foreach($cats as $cat) {
											
											if ($count >= 1) {
												$term_title .= ", ";
											}

											$term_title .= get_cat_name($cat);
											$count ++;
										};
									}
									
									if($slide_count == 1) {
										$slide_class = "stacked";
									} else {
										$slide_class = "stacked-a";
									}
									
									$slide_class = 'stacked';
								
										include( locate_template( 'views/components/blocks/sub-components/teaser-types/render-blocks/auto-cats-carousel.php', false, false ) );
									
									$slide_count ++;
								}
							}		

							wp_reset_postdata();
						?>

					</div>
                </div>
            </div>
        </div>
	</div>

</section>
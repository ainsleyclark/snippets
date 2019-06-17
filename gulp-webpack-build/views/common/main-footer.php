


<?php
    $image = get_field('footer_logo', 'options');
    $strapline = get_field('footer_strapline', 'options');
    $footer_social = get_field('footer_social', 'options');
	$social_links = $footer_social['social_links'];
	
	$footer_accreditation = get_field('footer_accreditation', 'options');
	$logos = $footer_accreditation['logos'];
	
	include( locate_template( 'views/components/blocks/block-form-footer.php', false, false ) ); 
	
?>


<footer class="container-fluid footer">
    <div class="row">
        
		<div class="col-lg-4 footer-left">
			<div class="inner">
				<div class="main-logo">
					<img data-src="<?php echo $image['url']; ?>" alt="logo" class="lazy-img"/>
					
					<noscript>
						<img src="<?php echo $image['url']; ?>" alt="logo"/>
					</noscript>
					
				</div> 
			</div>     
		</div>

		<div class="col-lg-4 footer-mid">
			<div class="inner">
				
			</div>
		</div>

		<div class="col-lg-4 footer-right">
			<div class="inner">

				<div class="main-strapline">
					<h3><?php echo $strapline; ?></h3>
				</div>

			</div>
		</div>
         
    </div>

    <div class="row">

        <div class="col-lg-4 footer-left">
            <div class="inner">
			
				<div class="footer-links tiny">
					<?php seed_footer_links(); ?>
				</div>

                <div class="copyright tiny">
                    &copy; <?php echo date("Y"); ?> Reddico Ltd is a registered company in England and Wales.<br/>
                    Company Number: 06671791  |  VAT Number: GB 141798100.
                </div>
               
            </div>
        </div>

         <div class="col-lg-4 footer-mid">
            <div class="inner">
				<div class="footer-logos">
					<?php 
						$count = count($logos);
						$image_width = (100 / $count) - 10; 
						foreach($logos as $logo) {
							$logo = $logo['logo'];
							$link = $logo['link'];
					?>
						<img data-src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="lazy-img"  />
						
						<noscript>
							<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"  />
						</noscript>
						
					<?php } ?>
				</div>
            </div>
        </div>

         <div class="col-lg-4 footer-right">
            <div class="inner">
                <div class="social-links">
                    <?php
                        foreach($social_links as $social) {
                            $icon = $social['social_icon'];
                            $link = $social['link'];
                    ?>
                    			<a href="<?php echo $link; ?>" class="social"><?php echo $icon; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</footer>




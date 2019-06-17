<?php // Uses the standard Bootstrap navigation system ?>

<div id="sticky-header">
	<nav class="main-nav navbar navbar-expand-lg header d-none d-lg-block" >
		<div class="container-fluid">
			
			<div class="logo col-lg-2">
				<a class="navbar-brand" href="<?php echo get_bloginfo('url'); ?>" title="Home"><img src="<?php echo get_template_directory_uri(); ?>/build/images/header/logo.svg" class="main-logo" /></a>
			</div>
			
			<div class="collapse navbar-collapse center-nav col-lg-8" id="navbar-nav">
				<?php seed_main_nav(); ?>
			</div>
			
			<div class="get-in-touch col-lg-2">
				<ul class="nav-contact">
					<li>
						<a href="<?php echo get_bloginfo('url'); ?>/get-in-touch" class="nav-link"><i class="fas fa-paper-plane"></i>  Get In Touch</a>
					</li>
				</ul>
			</div>

		</div>
	</nav>
	
	<?php // Mobile only nav (Had to be this way for alignment) ?>
	
	<nav class="main-nav navbar navbar-expand-lg header d-block d-lg-none d-xl-none" >
		<div class="container-fluid">
		
			<a class="navbar-brand" href="<?php echo get_bloginfo('url'); ?>" title="Home"><img src="<?php echo get_template_directory_uri(); ?>/build/images/header/logo.svg" class="main-logo" /></a>
			
			<button class="navbar-toggler navbar-toggle-custom" type="button" data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<div></div>
				<div></div>
				<div></div>
			</button>
			
			<div class="collapse navbar-collapse center-nav" id="navbar-nav">
				<?php seed_main_nav(); ?>
				<ul class="nav-contact">
					<li>
						<a href="<?php echo get_bloginfo('url'); ?>/get-in-touch" class="nav-link"><i class="fas fa-paper-plane"></i>  Get In Touch</a>
					</li>
				</ul>
			</div>

		</div>
	</nav>
	
</div>

		



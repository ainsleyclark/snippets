


<?php if($bg_colour == 'orange-radial' && !$is_header) { 
	
	
	if(is_front_page()) {
		include( locate_template( 'views/components/utilities/shape-overlays/orange-alt-overlay.php', false, false ) );
	} else {
		include( locate_template( 'views/components/utilities/shape-overlays/orange-overlay.php', false, false ) );
	}
} ?>

<?php if($bg_colour == 'purple-radial' && !$is_header) { 
	
	if(is_front_page()) {
		include( locate_template( 'views/components/utilities/shape-overlays/purple-alt-overlay.php', false, false ) );
	} else {
		include( locate_template( 'views/components/utilities/shape-overlays/purple-overlay.php', false, false ) );
	}
} ?>

<?php if($bg_colour == 'green-radial' && !$is_header) { 
	include( locate_template( 'views/components/utilities/shape-overlays/green-overlay.php', false, false ) );
} ?>

<?php if($case_study) { 
	include( locate_template( 'views/components/utilities/shape-overlays/blog-overlay.php', false, false ) );
} ?>

<?php if($bg_colour == "select" && !$is_header) {
	include( locate_template( 'views/components/utilities/shape-overlays/white-overlay.php', false, false ) );
} ?>
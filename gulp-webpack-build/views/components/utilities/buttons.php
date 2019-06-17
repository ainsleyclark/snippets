<?php

// Global button creator
// Make sure that the var from custom fields equals $button

$btn_type = $button['button_type']; 
$btn_style = $button['button_style']; 
$btn_action = $button['button_action']; 
$btn_size = $button['button_size'];

$link = $button['link']; 
$file = $button['file']; 

$multiple = $button['multiple_buttons'];

$size = "";

switch($btn_size) {
	case 'large':
		$size = "btn-large";
	break;
	case 'medium':
		$size = "btn-medium";
	break;
	case 'small':
		$size = "btn-small";
	break;
}



?>

<?php if($link || $file || $multiple) { ?>
	<div class="button-container">
		<?php if($btn_type == 'single') { 
			
				if($btn_action == 'link') { ?>
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="btn <?php echo $btn_style; ?> <?php echo $size; ?>">
						<?php echo $link['title']; ?>
					</a>
		<?php } else { ?>
					<a href="<?php echo $file['url']; ?>" class="btn <?php echo $btn_style; ?> <?php echo $size; ?>"><?php echo $file['filename']; ?></a>
		<?php }; 
			} 
			
			if($btn_type == 'multiple-buttons') {
				
				foreach($multiple as $btn) {
						$btn_style = $btn['r_button_style']; 
						$btn_action = $btn['r_button_action']; 
						$link = $btn['link']; 
						$file = $btn['file']; 
						

						if($btn_action == 'link') { ?>
							<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="btn <?php echo $btn_style; ?> btn-inline-block <?php echo $size; ?>">
								<?php echo $link['title']; ?>
							</a>
		<?php } else { ?>
							<a href="<?php echo $file['url']; ?>" class="btn <?php echo $btn_style; ?> btn-inline-block <?php echo $size; ?>"><?php echo $file['filename']; ?></a>
		<?php }; }; }; ?>
	</div>
<?php } ?>






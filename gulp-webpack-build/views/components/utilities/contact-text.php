<?php

$email = $contact_info['email_address'];
$phone = $contact_info['telephone'];
$address = $contact_info['address'];
$direction_link = $contact_info['directions_link'];

?>


<div class="container">
	<div class="row">
			<div class="col-md-6">
				<div class="contact-block">
					<header>
						<h4 class="text-green  bold">Email</h4>
					</header>
					
					<h4><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h4>
				</div>
				
				<div class="contact-block">
					<header>
						<h4 class="text-green  bold">Phone</h4>
					</header>
					
					<h4><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></h4>
				</div>
			</div>
			<div class="col-md-6">
				<header>
					<h4 class="text-green  bold">Address</h4>
				</header>
				
				<h4><?php echo $address; ?></h4>
				
				<h4><a href="<?php echo $direction_link; ?>" class="bold">Get directions</a></h4>
			</div>
	</div>
</div>
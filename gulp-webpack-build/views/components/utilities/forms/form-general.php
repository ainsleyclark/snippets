
<div class="container form-success">
	<div class="row form-component">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<h3 class="text-center">
				Thank you for your submission
			</h3>
			
			<div class="message text-center">
				
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
</div>


<div class="container form-main">
	
	<div class="container form-fail">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<p>
					<strong>Please enter the required fields below</strong>
				</p>
			</div>
			<div class="col-lg-1"></div>
		</div>
	</div>
	
	<form action="#" class="needs-validation" id="general-form" method="post" novalidate>
	
	<div class="row ">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-5">
			<div class="form-group">
				<input id="name" name="name" type="text" placeholder="Full Name*" class="form-control" id="full-name" required>
				
			</div>
			
			<div class="form-group">
				<input id="phone" name="phone" type="text" placeholder="Phone Number*" id="phone-number" class="form-control" required>
				
			</div>
			
			<div class="form-group">
				<input id="email" name="email" type="text" placeholder="Email Address*" id="email-address" class="form-control" required>
				
			</div>
		
		</div>
		
		<div class="col-lg-5">
			
			<div class="form-group">
				<textarea id="message" name="message" placeholder="Message" id="message" class="form-control form-message" rows="8"></textarea>
				
			</div>
			
		</div>
		
		<div class="col-lg-1"></div>
	</div>
	
	<div class="row form-component">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10">
			
			<div class="form-group checker">
				<input type="checkbox" id="info" value="No" name="info" class="checkbox"> 
				<label for="info" class="bold tiny">Please tick if you wish to be informed of other information from Reddico. Your information will not be sold to a third party. For more information, review our <a href="#demo" data-toggle="collapse" >Privacy Policy</a>.</label>
			</div>
			
			<div class="form-group checker priv">
				<input type="checkbox" id="privacy" value="No" class="checkbox" name="privacy" required> 
				<label for="privacy" class="bold tiny">I have read and accept the <a href="#demo" data-toggle="collapse" >Privacy Policy</a> below relating to UK data protection laws and GDPR.</label>
				<div class="priv-error"></div>
			</div>
			
			
			
			<div class="form-group">
				
			</div>
		</div>
		
		<div class="col-lg-1"></div>
		
	</div>
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-5">
			
		</div>
		<div class="col-lg-5 text-right">
			<button type="submit" class="btn btn-light-gray">Let's make it happen</button>
		</div>
		<div class="col-lg-1"></div>
	</div>
	
	<div class="row">
		<div class="col-lg-1"></div>
		<div id="demo" class="collapse col-lg-10">
			<div class="tiny terms-inner">
				<?php echo get_field('form_terms', 'options'); ?>
			</div>
		</div>
		<div class="col-lg-1"></div>
	</div>
	
	<div class="antispam"><input type="text" name="url" autocomplete="off" tabindex="-1"></div>
	<?php wp_nonce_field('test_action', 'submit_post'); ?>
	
	</form>
</div>







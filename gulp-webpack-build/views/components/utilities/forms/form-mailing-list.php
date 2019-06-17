<section class="container form-mailing-list">
	<div class="row">
		<div class="mailer col-lg-<?php echo $num_cols; ?>">
			<form action= "/" class="needs-validation" id="mailing-form" novalidate>
				<div class="inner">
					<div class="text-content">
						<header>
							<span class="uppercase role">Sign Up</span>
							
							<h3>Jobs Mailing List</h3>
						</header>
						
						<div class="intro text-dark-gray">
							Sign Up to hear first, whenever we have a new position at Reddico*
						</div>
						
						<div class="form form-main">
							<div class="form-group">
								<input id="name" type="text" placeholder="Full Name*" class="form-control" id="full-name" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
							
							<div class="form-group">
								<input id="email" type="text" placeholder="Email Address*" id="email-address" class="form-control" required>
								<div class="valid-feedback">Valid.</div>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						
						<div class="form form-success">
							<h3>Thank you for your submission</h3>
						</div>
						
						<div class="submit-button text-center">
							<button type="submit" class="btn btn-small btn-light-gray">Subscribe</button>
						</div>
						
						<div class="tiny text-dark-gray">
							<sup>*</sup>We will only contact you regarding jobs.You will not receive any other emails (unless you have already signed up elsewhere).
						</div>
						
						<div id='recaptcha' class="g-recaptcha"
							data-sitekey="6LdHFqYUAAAAAF7eSBefOlRN8dsQwH16Z6sYI7i3"
							data-callback="onSubmit"
							data-size="invisible"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>




<?php

$title = 'Login';

require('view/Hydrogen/header.php');

?>
	
	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Contact</h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="#">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="First Name">	
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Last Name">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email Address">
								</div>
								<div class="form-group">
									<textarea name="message" id="message" cols="30" class="form-control" rows="10"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Send Message">
								</div>
							</div>
						</div>
					</form>
					
				</div>
        		
        	</div>
       </div>
	</div>
	
	<?php
require('view/Hydrogen/footer.php');
?>

<?php

$title = 'Register';
$mode = 'register.php';

require('view/Hydrogen/header.php');

?>
	
	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2><?php echo $title; ?></h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="#">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Username" required>	
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email Address" required>
								</div>
								<div class="form-group">
								<p><small><input type="checkbox" required> I accept the <?php a('Terms &amp; Conditions', 'index.php?content=terms', '', 'new_tab'); ?> of <?php echo $config['siteName']; ?></small></p>
									<input type="submit" class="btn btn-primary" value="Register">
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

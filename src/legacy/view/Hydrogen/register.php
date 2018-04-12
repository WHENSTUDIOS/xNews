<?php

$title = 'Register';
$mode = 'register.php';
$name = 'register';

require('view/Hydrogen/header.php');
if(isset($_SESSION['username'])){
	route('c', 'index');
}
?>
	
	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2><?php echo $title; ?></h2>
					<?php
					if(isset($_SESSION['error'])){
						_error($_SESSION['error']);
						unset($_SESSION['error']);
					}
					?>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="lib/handlers/register.php" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="username" id="username" class="form-control" placeholder="Username" required>	
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
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

<?php

$title = 'Login';
$mode = 'login.php';
$name = 'login';

require('view/Hydrogen/header.php');

?>
	
	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2><?php echo $title; ?></h2>
					<?php
					if(isset($_SESSION['success'])){
						_success($_SESSION['success']);
						unset($_SESSION['success']);
					}
					if(isset($_SESSION['error'])){
						_error($_SESSION['error']);
						unset($_SESSION['error']);
					}
					?>
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
									<input type="submit" class="btn btn-primary" value="Log In">
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

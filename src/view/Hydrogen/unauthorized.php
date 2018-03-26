<?php

$title = 'Unauthorized!';
$name = 'unauthorized';

require('view/Hydrogen/header.php');

?>
	
	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<center><h1 class="error"><?php echo $title; ?></h1>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="#">
						<div class="row">
							<div class="col-md-12">
								<h3>You are not authorized to access this page.</h3>
							</div>
						</div></center>
					</form>
					
				</div>
        		
        	</div>
       </div>
	</div>
	
	<?php
require('view/Hydrogen/footer.php');
?>

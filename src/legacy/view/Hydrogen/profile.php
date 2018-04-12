<?php

$title = 'Author Profile';
$name = 'profile';
$login = false;

if(!isset($_GET['user'])){
	route('c', 'index');
}

require 'view/Hydrogen/header.php';


//GET USER LIST
$profileGet = $_GET['user'];

?>

	
	
	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">	
					<?php
						$getuserlist = "SELECT * FROM users WHERE username = '$profileGet';";
						if($query = $mysqli->query($getuserlist)){
							while($rows = $query->fetch_assoc()){
								if($rows['bio'] === ''){
									echo "
									<h2>".$rows['username']."</h2>
									<div class='fh5co-spacer fh5co-spacer-sm'></div>
									<p>
									<p>No description given.</p>
								";
								} else {
									echo "
									<h2>".$rows['username']."</h2>
									<div class='fh5co-spacer fh5co-spacer-sm'></div>
									<p>
									<p>".$rows['bio']."</p>
								";
								}
							}
						}
					?>
				</div>
				
        		
        	</div>
       </div>
	</div>

<?php

require('view/Hydrogen/footer.php');
?>
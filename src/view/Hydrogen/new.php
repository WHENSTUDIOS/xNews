<?php
$title = 'New Article';
$name = 'new';
require('view/Hydrogen/header.php');
?>
<!-- Initialize text editor -->
<script>
$(document).ready(function() {
  $("#editor").wysibb()
})
</script>
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
					<form action="lib/handlers/login.php" method="post">
						<div class="row">
						<div class="col-xl-4">
                        <textarea id="editor" class="form-control" name="editor">My text</textarea>
                        <br>
							<div class="col-xl-4">
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Post">
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
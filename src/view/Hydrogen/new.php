<?php
$title = 'New Article';
$name = 'new';
$login = true;
$level = 2;
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
					<form action="lib/handlers/createArticle.php" method="post">
						<div class="row">
						<div class="col-xl-4">
                            Supports most <strong>HTML</strong> syntax. Take a look at our <?php a('Cheat Sheet', 'index.php?content=htmlsyntax', '', 'new_tab'); ?>!
                        <textarea id="editor" class="form-control" name="editor">Article body</textarea>
                        <br>
							<div class="col-xl-4">
								<div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Post">
                                    <?php a('Save Draft', 'index.php?action=savedraft', 'btn btn-warning', ''); ?>
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
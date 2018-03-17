<?php

?>

	<footer id="fh5co-footer">
		
		<div class="container">
			<div class="row row-padded">
				<div class="col-md-12 text-center">
					<p class="fh5co-social-icons">
						<a href="#"><i class="icon-twitter"></i></a>
						<a href="#"><i class="icon-facebook"></i></a>
						<a href="#"><i class="icon-instagram"></i></a>
						<a href="#"><i class="icon-dribbble"></i></a>
						<a href="#"><i class="icon-youtube"></i></a>
					</p>
					<p><small>&copy; xNews <?php echo date('Y'); ?>. All rights reserved. Designed by <?php a('Hydrogen', 'http://freehtml5.co/', '', ''); ?> | Wanna join in the fun? <?php a('Register', '?content=register', '', ''); ?> </small></p>
					<p><small><?php 
					//Unable to use a() function because too little support
					
					if($_COOKIE['themeMode'] === 'light'){
						a('<b>LIGHT</b>', 'index.php?content=theme&theme=light', '', '');
						echo ' | ';
						a('DARK', 'index.php?content=theme&theme=dark', '', '');
					} elseif($_COOKIE['themeMode'] === 'dark'){
						a('LIGHT', 'index.php?content=theme&theme=light', '', '');
						echo ' | ';
						a('<b>DARK</b>', 'index.php?content=theme&theme=dark', '', '');
					}
					
					?></small></p>
				</div>
			</div>
		</div>
	</footer>


	<!-- jQuery -->
	<script src="js/Hydrogen/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/Hydrogen/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/Hydrogen/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/Hydrogen/jquery.waypoints.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/Hydrogen/jquery.magnific-popup.min.js"></script>
	<!-- Salvattore -->
	<script src="js/Hydrogen/salvattore.min.js"></script>
	<!-- Main js/Hydrogen -->
	<script src="js/Hydrogen/main.js"></script>

	

	
	</body>
</html>
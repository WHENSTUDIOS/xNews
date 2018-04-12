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
					<p><small>&copy; xNews <?php echo date('Y'); ?>. All rights reserved. Designed by <a href="http://freehtml5.co">Hydrogen</a> | 
					<?php if(!Auth::guest()): ?>
					<a href="<?php echo e(url('logout')); ?>">Log Out</a></small></p>
					<?php else: ?>
					Wanna join in the fun? 
					<a href="<?php echo e(url('register')); ?>">Register</a></small></p>
					<?php endif; ?>
					<p><small><b>LIGHT</b> | DARK</small></p>
				</div>
			</div>
		</div>
	</footer>

	 <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
	<!-- jQuery -->
	<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo e(asset('js/jquery.easing.1.3.js')); ?>"></script>
	<!-- Bootstrap -->
	<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	<!-- Waypoints -->
	<script src="<?php echo e(asset('js/jquery.waypoints.min.js')); ?>"></script>
	<!-- Magnific Popup -->
	<script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
	<!-- Salvattore -->
	<script src="<?php echo e(asset('js/salvattore.min.js')); ?>"></script>
	<!-- Main js/Hydrogen -->
	<script src="<?php echo e(asset('js/main.js')); ?>"></script>

	

	
	</body>
</html>
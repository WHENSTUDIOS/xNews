<?php $__env->startSection('title', 'Register'); ?>
<?php $__env->startSection('main_content'); ?>
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Register</h2>
                    <?php if($errors->has('password')): ?>
                        <p><span class="error"><strong>Error</strong>: <?php echo e($errors->first('password')); ?></span></p>
                    <?php endif; ?>
                    <?php if($errors->has('name')): ?>
                        <p><span class="error"><strong>Error</strong>: <?php echo e($errors->first('name')); ?></span></p>
                    <?php endif; ?>
                    <?php if($errors->has('email')): ?>
                        <p><span class="error"><strong>Error</strong>: <?php echo e($errors->first('email')); ?></span></p>
                    <?php endif; ?>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="<?php echo e(route('register')); ?>" method="post">
                    <?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control" placeholder="Username" required>	
								</div>
							</div>
							<div class="col-md-6">
                                <div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
								</div>
							</div>
							<div class="col-md-12">
                                <div class="form-group">
									<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
								<p><small><input type="checkbox" required> I accept the <a href="terms">Terms &amp; Conditions</a> of <?php echo e(Config::get('site.data.name')); ?></small></p>
									<input type="submit" class="btn btn-primary" value="Register">
								</div>
							</div>
						</div>
					</form>
					
				</div>
        		
        	</div>
       </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
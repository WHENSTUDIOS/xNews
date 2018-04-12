<?php $__env->startSection('title', 'Log In'); ?>
<?php $__env->startSection('main_content'); ?>
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Log In</h2>
                    <?php if($errors->has('password')): ?>
                        <span class="error"><strong>Error</strong>: <?php echo e($errors->first('password')); ?></span>
                    <?php endif; ?>
                    <?php if($errors->has('email')): ?>
                        <span class="error"><strong>Error</strong>: <?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="<?php echo e(route('login')); ?>" method="post">
                    <?php echo csrf_field(); ?>
						<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required autofocus>	
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
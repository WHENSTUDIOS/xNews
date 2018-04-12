<?php $__env->startSection('title', 'Terms & Conditions'); ?>
<?php $__env->startSection('main_content'); ?>
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Terms &amp; Conditions</h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="#">
						<div class="row">
							<div class="col-md-12">
								<?php if($terms->data !== ''): ?>
                                <?php echo e($terms->data); ?>

                                <?php else: ?>
                                No Terms &amp; Conditions provided.
                                <?php endif; ?>
								<hr>
								<a onclick="window.history.go(-1); return false;" class="btn btn-primary">Back</a>
							</div>
						</div>
					</form>
					
				</div>
        		
        	</div>
       </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
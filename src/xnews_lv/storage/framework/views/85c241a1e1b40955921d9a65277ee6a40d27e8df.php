<?php $__env->startSection('title', 'Banned'); ?>
<?php $__env->startSection('main_content'); ?>
<div id="fh5co-main">
		<div class="container">

			<div class="row">
        <div id="fh5co-board" data-columns>
            <center><h1>You're banned!</h1>
                <p>Sorry, but you are currently banned from posting or viewing <?php echo e(Config::get('site.data.name')); ?>.</p>
            </center>
        </div>
        </div>
       </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
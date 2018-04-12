<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('main_content'); ?>
<div id="fh5co-main">
		<div class="container">

			<div class="row">
        <div id="fh5co-board" data-columns>
		<?php if(count($notices) >= 1): ?>
			<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="alert alert-danger">
				<strong><p><?php echo e($notice->name); ?></p></strong>
				<?php echo e($notice->content); ?>

			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
			<?php if(count($posts) >= 1): ?>
			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="item">
        		<div class="fh5co-desc">
				<h1><a href="posts/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h1>
					<strong>By</strong> <a href="profile/<?php echo e($post->user['id']); ?>"><?php echo e($post->user['name']); ?></a> <?php echo e($post->created_at->diffForHumans()); ?>

				</div>
        	</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
			<div class="col-md-8 col-md-offset-2">
				<center><h1 class="error">There are no articles!</h1>
				<div class="fh5co-spacer fh5co-spacer-sm"></div>
				<form action="#">
					<div class="row">
						<div class="col-md-12">
							<h3>Go read a book instead... Nothing to see here.</h3>
						</div>
					</div></center>
				</form>
			</div>
			<?php endif; ?>
        </div>
        </div>
       </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
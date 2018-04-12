 <?php $__env->startSection('title', 'Article View'); ?> <?php $__env->startSection('main_content'); ?>
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Edit Post <small><?php echo e($post->title); ?></small></h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="../../posts/<?php echo e($post->id); ?>" method="post">
                    <?php echo csrf_field(); ?>
						<div class="row">
						<div class="col-xl-4">
                        <label for="title">Post Title</label>
                        <?php if(count($errors) > 0): ?>
                        <div class="has-error">
                        <input id="title" name="title" class="form-control" value="<?php echo e($post->title); ?>" />
                        </div>
                        <?php else: ?>
                        <input id="title" name="title" class="form-control" value="<?php echo e($post->title); ?>" />
                        <?php endif; ?>
                        <br>
                        <label for="title">Article Content</label>
                        <textarea id="article-ckeditor" class="form-control" name="body"><?php echo $post->body; ?></textarea>
                        <br>
							<div class="col-xl-4">
								<div class="form-group">
                                    <input name="_method" type="hidden" value="PUT">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                    <a href="<?php echo e(url('/posts/'.$post->id)); ?>" class="btn btn-warning">Cancel</a>
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
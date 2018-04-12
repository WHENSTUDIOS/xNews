 <?php $__env->startSection('title', 'Article View'); ?> <?php $__env->startSection('main_content'); ?>
<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>Create Post</h2>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<form action="../posts" method="post">
                    <?php echo csrf_field(); ?>
						<div class="row">
						<div class="col-xl-4">
                        <label for="title">Post Title</label>
                        <?php if(count($errors) > 0): ?>
                        <div class="has-error">
                        <input id="title" name="title" class="form-control" placeholder="I need a title! Don't leave me behind..." />
                        </div>
                        <?php else: ?>
                        <input id="title" name="title" class="form-control" placeholder="Title" />
                        <?php endif; ?>
                        <br>
                        <label for="title">Article Content</label>
                        <textarea name="body" class="form-control" id="article-ckeditor">
                            <?php if(isset($template)): ?>
                            <?php echo $template->body; ?>

                            <?php endif; ?>
                        </textarea>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php $__env->startSection('title', 'Create Article'); ?> <?php $__env->startSection('page_title', 'Create Article'); ?> <?php $__env->startSection('page_description',
'Create a new article'); ?> <?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form method="POST" action="<?php echo e(url('/dashboard/articles/create/new')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <label>Body</label>
                        <textarea name="body" id="article-ckeditor">
                            <?php if(isset($template)): ?>
                            <?php echo $template->body; ?>

                            <?php endif; ?>
                        </textarea>
                </div>
                <div class="box-footer">

                    <button type="submit" class="btn btn-primary">Post</button>
                    <a href="<?php echo e(url('dashboard/articles/list')); ?>" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
    </div>
    </div>
    <div>
    </div>
    </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
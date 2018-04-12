 <?php $__env->startSection('title', 'New Template'); ?> <?php $__env->startSection('page_title', 'New Template'); ?> 
<?php $__env->startSection('page_description', 'New Template'); ?> <?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <?php echo $__env->make('dashboard.dashboard.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">New Template</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="<?php echo e(url('dashboard/content/templates/create')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" data-lpignore="true" class="form-control" name="title"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Template</label>
                            <textarea name="body" id="article-ckeditor"></textarea>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="<?php echo e(url('dashboard/content/templates')); ?>" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
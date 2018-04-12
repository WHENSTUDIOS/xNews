 <?php $__env->startSection('title', 'Database Info'); ?> <?php $__env->startSection('page_title', 'Edit Database Info'); ?> <?php $__env->startSection('page_description',
'MySQL database information'); ?> <?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <?php if(Session::get('success')): ?>
                    <div class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                    </div>
                <?php elseif(Session::get('error')): ?>
                    <div class="alert alert-danger">
                    <?php echo e(Session::get('error')); ?>

                    </div>
                <?php elseif(isset($errors)): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-error">
                            <?php echo e($error); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form method="POST" action="<?php echo e(url('/dashboard/settings/database')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Database Host</label>
                            <input type="text" id="title" name="db-host" value="<?php echo e(Config::get('database.connections.mysql.host')); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Database Username</label>
                            <input type="text" id="title" name="db-user" value="<?php echo e(Config::get('database.connections.mysql.username')); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Database Password</label>
                            <input type="text" id="title" name="db-pwd" value="<?php echo e(Config::get('database.connections.mysql.password')); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Database Name</label>
                            <input type="text" id="title" name="db-name" value="<?php echo e(Config::get('database.connections.mysql.database')); ?>" class="form-control">
                        </div>
                </div>
                <div class="box-footer">
                        <p><strong>Important</strong>: If the values in this form are entered incorrectly and/or cannot connect to the database using the new values, you will only be able to change them via the config file in the file system.</p>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="<?php echo e(url('dashboard')); ?>" class="btn btn-warning">Cancel</a>
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
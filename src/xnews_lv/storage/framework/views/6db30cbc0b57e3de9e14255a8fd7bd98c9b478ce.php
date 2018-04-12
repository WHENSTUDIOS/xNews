 <?php $__env->startSection('title', 'Create User'); ?> <?php $__env->startSection('page_title', 'Create User'); ?> <?php $__env->startSection('page_description',
'Create a user account'); ?> <?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Custom User Registration</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="<?php echo e(url('dashboard/users/create/user')); ?>">
                <?php echo csrf_field(); ?>
                    <div class="box-body">
                    <?php if(isset($success)): ?>
                    <div class="alert alert-success">
                    <?php echo e($success); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(isset($errors)): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-error">
                        <?php echo e($error); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="name" placeholder="Username" autocomplete="off" required autofocus />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="example@example.com" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <label>Auth Level</label>
                            <select id="level" name="level" class="form-control">
                                <option id="1" value="1">Normal User</option>
                                <option id="2" value="2">Editor</option>
                                <option id="3" value="3">Moderator</option>
                                <option id="4" value="4">Admin</option>
                            </select>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required> I agree that I have permission to register a new user using the email provided.
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
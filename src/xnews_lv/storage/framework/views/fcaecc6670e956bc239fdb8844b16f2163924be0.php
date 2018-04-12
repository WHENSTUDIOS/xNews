<?php $__env->startSection('title', 'User List'); ?>
<?php $__env->startSection('page_title', 'User List'); ?>
<?php $__env->startSection('page_description', 'All users (including banned)'); ?>
<?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <?php echo $__env->make('dashboard.dashboard.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Account Created</th>
                                <th>Auth Level</th>
                                <th>Actions</th>
                            </tr>
                            <?php if(count($users) <= 0): ?>
                            No articles to display.
                            <?php else: ?>  
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->created_at->diffForHumans()); ?></td>
                                        <td><?php echo e($user->level); ?></td>
                                        <form action="<?php echo e(url('dashboard/users/delete/'.$user->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input name="_method" type="hidden" value="DELETE">
                                        <td><a class="btn btn-warning btn-xs" href="<?php echo e(url('profile/'.$user->id)); ?>">Profile</a> | <a class="btn btn-success btn-xs" href="<?php echo e(url('dashboard/users/edit/'.$user->id)); ?>">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
                                        </form>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
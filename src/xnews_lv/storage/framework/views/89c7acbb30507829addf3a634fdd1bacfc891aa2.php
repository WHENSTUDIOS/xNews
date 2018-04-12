<?php $__env->startSection('title', $q.' - User Search'); ?>
<?php $__env->startSection('page_title', 'Search Results'); ?>
<?php $__env->startSection('page_description', 'Did we find something?'); ?>
<?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">We found <?php echo e(count($result)); ?> result<?php echo e(count($result) === 1 ? '' : 's'); ?> for <strong><?php echo e($q); ?></strong></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <?php if(count($result) <= 0): ?>
                        
                            <?php else: ?> 
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Account Created</th>
                                <th>Auth Level</th>
                                <th>Actions</th>
                            </tr>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($res->id); ?></td>
                                        <td><?php echo e($res->name); ?></td>
                                        <td><?php echo e($res->email); ?></td>
                                        <td><?php echo e($res->created_at); ?> UTC</td>
                                        <td><?php echo e($res->level); ?></td>
                                        <form action="<?php echo e(url('dashboard/users/delete/'.$res->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input name="_method" type="hidden" value="DELETE">
                                        <td><a class="btn btn-warning btn-xs" href="<?php echo e(url('profile/'.$res->id)); ?>">Profile</a> | <a class="btn btn-success btn-xs" href="<?php echo e(url('dashboard/users/edit/'.$res->id)); ?>">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
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
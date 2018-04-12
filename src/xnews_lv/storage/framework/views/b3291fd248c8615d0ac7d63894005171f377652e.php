<?php $__env->startSection('title', $q.' - Post Search'); ?>
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
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Last Updated</th>
                                <th>Author</th>
                                <th>Last Editor (ID)</th>
                                <th>Actions</th>
                            </tr>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($post->id); ?></td>
                                        <td><?php echo e($post->title); ?></td>
                                        <td><?php echo e($post->created_at->diffForHumans()); ?></td>
                                        <td><?php echo e($post->updated_at->diffForHumans()); ?></td>
                                        <td><?php echo e($post->user['name']); ?></td>
                                        <td><?php echo e($post->update_id); ?>

                                        <td><a href="<?php echo e(url('posts/'.$post->id)); ?>" target="_blank">View on Website</a></td>
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
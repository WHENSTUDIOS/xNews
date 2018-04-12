<?php $__env->startSection('title', 'Article List'); ?>
<?php $__env->startSection('page_title', 'Article List'); ?>
<?php $__env->startSection('page_description', 'All published and visible articles'); ?>
<?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <?php echo $__env->make('dashboard.dashboard.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Articles</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Created On</th>
                                <th>Last Updated</th>
                                <th>Author</th>
                                <th>Last Editor (ID)</th>
                                <th>Actions</th>
                            </tr>
                            <?php if(count($posts) <= 0): ?>
                            No articles to display.
                            <?php else: ?>  
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($post->id); ?></td>
                                        <td><?php echo e($post->title); ?></td>
                                        <td><?php echo e($post->created_at->diffForHumans()); ?></td>
                                        <td><?php echo e($post->updated_at->diffForHumans()); ?></td>
                                        <td><?php echo e($post->user['name']); ?></td>
                                        <td><?php echo e($post->update_id); ?>

                                        <form action="<?php echo e(url('dashboard/articles/delete/'.$post->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input name="_method" type="hidden" value="DELETE">
                                        <td><a class="btn btn-success btn-xs" href="<?php echo e(url('dashboard/articles/edit/'.$post->id)); ?>">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
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
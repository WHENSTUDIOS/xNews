 <?php $__env->startSection('title', Config::get('site.data.name') . ' - ' . $post->title); ?> <?php $__env->startSection('main_content'); ?>
<div id="fh5co-main">
    <div class="container">
        <div class="row">
            <div class="item">
                <div class="fh5co-desc">
                    <h1><?php echo e($post->title); ?></h1>
                    <?php echo $post->body; ?>

                    <hr>
                    <h3>
                                <form action="../posts/<?php echo e($post->id); ?>" method="POST">
                                <small>
                            Posted by
                            <strong>
                                <?php echo csrf_field(); ?>
                                <a href="../profile/<?php echo e($post->user['id']); ?>"><?php echo e($post->user['name']); ?> </a></strong>
                                <?php if($post->created_at == $post->updated_at): ?>
                                <?php echo e($post->created_at->diffForHumans()); ?>

                                <?php else: ?>
                                | Last modified <i><?php echo e($post->updated_at->diffForHumans()); ?></i>
                                <?php endif; ?>
                                <?php if(Auth::check() && Auth::user()->level >=2): ?>
                                <span class="functions"><a href="../posts/<?php echo e($post->id); ?>/edit">Edit</a>
                                <?php if(Auth::check() && Auth::user()->level >=3): ?>
                                |
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="submit" class="delete-button error" value="Delete"/></span>
                                <?php endif; ?>
                                <?php endif; ?>
                                </form>
                        </small>
                        </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
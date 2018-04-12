<?php $__env->startSection('title', 'Search Users'); ?>
<?php $__env->startSection('page_title', 'Search Users'); ?>
<?php $__env->startSection('page_description', 'Find users by a quick search'); ?>
<?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-success" data-vivaldi-spatnav-clickable="1">
        <form method="POST" action="<?php echo e(url('dashboard/users/search/result')); ?>">
        <?php echo csrf_field(); ?>
            <div class="box-header with-border">
              <h3 class="box-title">Search a User</h3>
            </div>
            <div class="box-body">
              <input class="form-control input-lg" name="q" type="text" placeholder="Username or Email Address">
              <br>
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <!-- /.box-body -->
          </div>
          </form>
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
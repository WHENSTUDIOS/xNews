<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page_title', 'Dashboard'); ?>
<?php $__env->startSection('page_description', 'User control panel'); ?>
<?php $__env->startSection('main_content'); ?>
<section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Articles</span>
              <span class="info-box-number"><?php echo e($posts); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number"><?php echo e($users); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-question"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Article Requests</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Staff Members</span>
              <span class="info-box-number"><?php echo e(count($staff)); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
      <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">My Articles</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body table-responsive no-padding">
                    <?php if(count($myposts) <=0 ): ?> 
                    <div class="form-group">
                        <center>You have no articles!
                        </center>
                </div>
                <?php else: ?>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        <?php $__currentLoopData = $myposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mypost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($mypost->title); ?></td>
                            <td><?php echo e($mypost->created_at->diffForHumans()); ?></td>
                            <td>
                                <a class="btn btn-warning btn-xs" target="_blank" href="<?php echo e(url('posts/'.$mypost->id)); ?>">View</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-danger" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Newest Users</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body table-responsive no-padding">
                    <?php if(count($new_users) <=0 ): ?> 
                    <div class="form-group">
                        <center>There are no users.
                        </center>
                </div>
                <?php else: ?>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Username</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        <?php $__currentLoopData = $new_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($new_user->name); ?></td>
                            <td><?php echo e($new_user->created_at->diffForHumans()); ?></td>
                            <td>
                                <a class="btn btn-warning btn-xs" target="_blank" href="<?php echo e(url('profile/'.$new_user->id)); ?>">Profile</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>

</div></section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
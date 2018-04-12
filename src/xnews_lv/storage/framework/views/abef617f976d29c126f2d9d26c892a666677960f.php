 <?php $__env->startSection('title', 'Edit User'); ?> <?php $__env->startSection('page_title', 'Edit User'); ?> <?php $__env->startSection('page_description',
$user->name); ?> <?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
        <?php echo $__env->make('dashboard.dashboard.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit <?php echo e($user->name); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="<?php echo e(url('dashboard/users/edit/details/'.$user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-name" placeholder="Username" value="<?php echo e($user->name); ?>"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email Address</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-email" placeholder="example@example.com" value="<?php echo e($user->email); ?>"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label>Auth Level</label>
                            <select id="level" name="edit-level" class="form-control">
                                <option class="bg-danger text-white" id="0" value="0" <?php echo e($user->level === 1 ? 'selected' : ''); ?>>Banned</option>
                                <option id="1" value="1" <?php echo e($user->level === 1 ? 'selected' : ''); ?>>Normal User</option>
                                <option id="2" value="2" <?php echo e($user->level === 2 ? 'selected' : ''); ?>>Editor</option>
                                <option id="3" value="3" <?php echo e($user->level === 3 ? 'selected' : ''); ?>>Moderator</option>
                                <option id="4" value="4" <?php echo e($user->level === 4 ? 'selected' : ''); ?>>Admin</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Edit User</button>
                    </div>
                </form>
            </div>
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Change <?php echo e($user->name); ?>'s Password</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="<?php echo e(url('dashboard/users/edit/password/'.$user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" data-lpignore="true" class="form-control" name="new-password" placeholder="" autocomplete="new-password"
                                required />
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Articles by <?php echo e($user->name); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body table-responsive no-padding">
                    <?php if(count($posts)
                    <=0 ): ?> <div class="form-group">
                        <center>No articles found for
                            <strong><?php echo e($user->name); ?></strong>
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
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->title); ?></td>
                            <td><?php echo e($post->created_at); ?></td>
                            <td>
                                <a class="btn btn-warning btn-xs" target="_blank" href="<?php echo e(url('posts/'.$post->id)); ?>">View</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
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
                <h3 class="box-title">Profile Settings</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" autocomplete="nope" action="<?php echo e(url('dashboard/users/edit/profile/'.$user->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">About Me</label>
                        <textarea name="bio" id="article-ckeditor"><?php echo $social->bio; ?></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Twitter</label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="twitter" value="<?php echo e($social->twitter); ?>" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Google+</label>
                            <input type="text" name="googleplus" value="<?php echo e($social->googleplus); ?>" class="form-control" placeholder="Full G+ Profile URL">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Facebook</label>
                            <input type="text" name="facebook" value="<?php echo e($social->facebook); ?>" class="form-control" placeholder="Full Profile URL">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">YouTube</label>
                        <div class="input-group">
                            <span class="input-group-addon">youtube.com/</span>
                            <input type="text" name="youtube" value="<?php echo e($social->facebook); ?>" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Skype</label>
                            <input type="text" name="skype" value="<?php echo e($social->facebook); ?>" class="form-control" placeholder="Username">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save Profile Settings</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php $__env->startSection('title', 'wCMS'); ?> <?php $__env->startSection('page_title', 'wCMS'); ?> <?php $__env->startSection('page_description',
'Edit the main data on the website'); ?> <?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
    <div class="col-md-6">
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
        <!-- left column -->
            <!-- general form elements -->
            <div class="box box-primary" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit <?php echo e(Config::get('site.data.name')); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" autocomplete="nope" action="<?php echo e(url('dashboard/content/wcms/general')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website Name</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-name" placeholder="Site Name" value="<?php echo e(Config::get('site.data.name')); ?>"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">URL</label>
                            <input type="text" data-lpignore="true" class="form-control" name="edit-url" placeholder="Full URL" value="<?php echo e(Config::get('site.data.url')); ?>"
                                autocomplete="new-password" required />
                        </div>
                        <div class="form-group">
                            <label>Language</label>
                            <select id="level" name="edit-lang" class="form-control">
                                <option id="1" value="en" <?php echo e(Config::get('app.locale') === 'en' ? 'selected' : ''); ?>>en-US</option>
                                <option id="2" value="fr" <?php echo e(Config::get('app.locale') === 'fr' ? 'selected' : ''); ?>>FR</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-danger" data-vivaldi-spatnav-clickable="1">
            <div class="box-header with-border">
                <h3 class="box-title">Access Settings</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" autocomplete="nope" action="<?php echo e(url('dashboard/settings/access')); ?>">
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Debug (maintenance) mode</label>

                  <div class="radio">
                    <label>
                      <input type="radio" name="debug" id="optionsRadios1" value="debug-enabled" <?php echo e(Config::get('app.debug') === true ? 'checked' : ''); ?>>
                      Enabled
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="debug" id="optionsRadios2" value="debug-disabled" <?php echo e(Config::get('app.debug') === false ? 'checked' : ''); ?>>
                      Disabled
                    </label>
                  </div>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">User theme switcher</label>

                  <div class="radio">
                    <label>
                      <input type="radio" name="switcher" id="optionsRadios1" value="switcher-enabled" <?php echo e(Config::get('site.data.allow-switcher') === 'true' ? 'checked' : ''); ?>>
                      Enabled
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="switcher" id="optionsRadios2" value="switcher-disabled" <?php echo e(Config::get('site.data.allow-switcher') === 'false' ? 'checked' : ''); ?>>
                      Disabled
                    </label>
                  </div>
                </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
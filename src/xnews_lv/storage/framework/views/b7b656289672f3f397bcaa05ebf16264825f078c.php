<?php $__env->startSection('title', 'Article Templates'); ?>
<?php $__env->startSection('page_title', 'Article Templates'); ?>
<?php $__env->startSection('page_description', 'Manage templates for new articles'); ?>
<?php $__env->startSection('main_content'); ?>
<section class="content">
    <div class="row">
        <div class="col-xs-6">
        <?php echo $__env->make('dashboard.dashboard.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="box" data-vivaldi-spatnav-clickable="1">
                <div class="box-header">
                    <h3 class="box-title">Templates</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <?php if(count($templates) <= 0): ?>
                            <center>No templates to display.</center>
                            <?php else: ?>  
                            <tr>
                                <th>Template Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                                <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($template->name); ?></td>
                                        <td>
                                            <?php if($template->status == '0'): ?>
                                            Inactive
                                            <?php elseif($template->status == '1'): ?>
                                            Active
                                            <?php endif; ?>
                                        </td>
                                        <?php if($template->status == '0'): ?>
                                        <form action="<?php echo e(url('dashboard/settings/templates/active/'.$template->id)); ?>" method="POST" style="display:inline !important;">
                                        <?php echo csrf_field(); ?>
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><input type="submit" class="btn btn-primary btn-xs" value="Make Active"> |
                                        </form>
                                        <?php elseif($template->status == '1'): ?>
                                        <form action="<?php echo e(url('dashboard/settings/templates/inactive/'.$template->id)); ?>" method="POST" style="display:inline !important;">
                                        <?php echo csrf_field(); ?>
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><input type="submit" class="btn btn-warning btn-xs" value="Make Inactive"> |
                                        </form>
                                        <?php endif; ?>
                                        <form style="display:inline !important;" action="<?php echo e(url('dashboard/settings/templates/delete/'.$template->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input name="_method" type="hidden" value="DELETE"><a class="btn btn-success btn-xs" href="<?php echo e(url('dashboard/settings/templates/edit/'.$template->id)); ?>">Edit</a> | <input type="submit" class="btn btn-danger btn-xs" value="Delete"/></span></td>
                                        </form>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                <a href="<?php echo e(url('dashboard/content/templates/create')); ?>" class="btn btn-primary">New Template</a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success" data-vivaldi-spatnav-clickable="1">
                <div class="box-header with-border">
                    <h3 class="box-title">Active Template</h3>
                </div>
                <div class="box-body pad">
                        <?php if(!isset($activetemplate)): ?> <div class="form-group">
                                <center>No active template found.
                                </center>
                        </div>
                        </div>
                        <?php else: ?>
                        <textarea name="body" disabled id="article-ckeditor"><?php echo $activetemplate->body; ?></textarea>
                        <?php endif; ?>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div>
    </div>
    </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
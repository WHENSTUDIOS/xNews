<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
<?php echo $__env->make('dashboard/dashboard/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('main_content'); ?>
<?php echo $__env->make('dashboard/dashboard/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
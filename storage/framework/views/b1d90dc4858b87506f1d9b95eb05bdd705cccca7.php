<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .show-container {
            position: absolute;
            right: 0;
            top: -60%;
            /* Sesuaikan margin sesuai kebutuhan */
        }
    </style>
    <div class="container-fluid p-0 bg-light-primary">

        <div class="row m-auto bg-white position-relative" style='max-width: 500px;height: 100vh;'>

            
            <?php echo $__env->yieldContent('karyawan_content'); ?>
            

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/karyawan/layouts/index.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title', 'Validation Forms'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/timepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Atur Jam Kerja</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Settings</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .show-container {
            position: absolute;
            right: 0;
            top: -5px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class=" col-md-12 mb-3 ">

                                <?php if(session('success')): ?>
                                    <div id="alert-message"
                                        class="alert alert-success dark alert-dismissible fade show"
                                        role="alert">
                                        <center>

                                            <strong class="text-center"><?php echo e(session('success')); ?></strong>



                                        </center>
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <form novalidate="" method="POST" action="<?php echo e(route('update-setting')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Jam Kerja</label>
                                    <div class="input-group clockpicker pull-center" data-placement="bottom"
                                        data-align="left" data-autoclose="true">
                                        <input class="form-control" type="text" name="check_in"
                                            value="<?php echo e($check_in); ?>"><span class="input-group-addon"><span
                                                class="glyphicon glyphicon-time"></span></span>
                                    </div>

                                    <?php $__errorArgs = ['check_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Jam Pulang Kerja</label>
                                    <div class="input-group clockpicker pull-center" data-placement="bottom"
                                        data-align="left" data-autoclose="true">
                                        <input class="form-control" type="text" name="check_out"
                                            value="<?php echo e($check_out); ?>"><span class="input-group-addon"><span
                                                class="glyphicon glyphicon-time"></span></span>
                                    </div>

                                    <?php $__errorArgs = ['check_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/time-picker/jquery-clockpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/time-picker/highlight.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/time-picker/clockpicker.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.btn-close').click();
            }, 3000);
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>
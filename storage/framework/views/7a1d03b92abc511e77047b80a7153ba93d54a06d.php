<?php $__env->startSection('karyawan_content'); ?>
    <div class="position-fixed  border-top border-1 p-0" style="max-width: 500px;">
        <div>
            <nav class="navbar navbar-dark bg-transparent px-3" style="box-shadow: 0px 1px 3px 0px #ccc;">
                <div class="w-100 d-flex flex-row justify-content-between align-items-center">
                    <button class="btn btn-link text-dark px-0 py-0" onclick="goBack()">
                        <i class="fa fa-arrow-circle-left fa-2x"></i>
                    </button>
                    <span class="navbar-brand mb-0 h1 text-warning">Permohonan Lembur</span>
                </div>
            </nav>
            <div class="px-3 py-3">

                <form novalidate="" method="POST" action="<?php echo e(route('store_lembur')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01 " class="font-dark">Tanggal Awal</label>
                            

                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="left"
                                data-autoclose="true">
                                <input class="form-control <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom01" type="text"
                                    name="start_date" value="<?php echo e(old('start_date')); ?>" autocomplete="off"><span
                                    class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    <?php $__errorArgs = ['start_date'];
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

                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01 " class="font-dark">Tanggal Akhir</label>

                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="left"
                                data-autoclose="true">
                                <input class="form-control <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text"
                                    name="end_date" value="<?php echo e(old('end_date')); ?>" autocomplete="off"><span
                                    class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    <?php $__errorArgs = ['end_date'];
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
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01" class=" font-dark">Alasan Lembur</label>

                            <div class="input-group">

                                <textarea class="form-control <?php $__errorArgs = ['alasan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom01" type="text"
                                    placeholder="Alasan Lembur" name="alasan" required="" value="<?php echo e(old('alasan')); ?>" rows="5"></textarea>

                                <?php $__errorArgs = ['alasan'];
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




                    </div>
                    <div class="text-center">

                        <button class="btn btn-secondary" type="submit">Buat Permohonan</button>
                    </div>

                </form>
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
        function goBack() {

            window.location.href = '/';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('karyawan.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/karyawan/absen/lembur.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title', 'Login'); ?>


<?php $__env->startSection('karyawan_content'); ?>
    <div class="container-fluid">

        
        <div class="flex flex-column px-5 justify-content-center align-items-center"
            style="height: 100vh; display: flex; align-items: center;">

            <div class="login-main w-100">
                <div class="w-full">
                    <div class="d-flex justify-content-center">

                        <img src="/assets/img/spln-icon.jpg" width="200" height="150" style="object-fit: cover;" />
                    </div>
                </div>
                <form class="theme-form" novalidate="" action="<?php echo e(route('post_karyawan')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="col-form-label text-black-50">NIP</label>
                        <input class="form-control" type="number" name="nip" required="" placeholder="11223344">
                        <?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <b class="text-dark"><?php echo e($message); ?></b>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label text-black-50">Password</label>
                        <div class="position-relative flex align-items-center justify-content-center">

                            <input class="form-control" type="password" name="password" required=""
                                placeholder="*********">
                            <div class="invalid-feedback">Please enter password.</div>
                            <div class="show-container">

                                <div class="show-hide"><span class="show text-warning"></span></div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <button class="btn btn-warning btn-block form-control" type="submit">Sign in</button>
                    </div>
                    
                    <div class="social mt-4">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('karyawan.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/karyawan/login/index.blade.php ENDPATH**/ ?>
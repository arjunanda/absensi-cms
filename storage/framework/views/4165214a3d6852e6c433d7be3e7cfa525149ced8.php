<?php $__env->startSection('title', 'Validation Forms'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Tambah Admin</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Tambah Admin</li>
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
                        <form novalidate="" method="POST" action="<?php echo e(route('store-admin')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Full Name</label>
                                    <input class="form-control <?php $__errorArgs = ['fullName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="validationCustom01" type="text" name="fullName" placeholder="Full Name"
                                        required="" value="<?php echo e(old('fullName')); ?>" name="fullName">


                                    <?php $__errorArgs = ['fullName'];
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
                                    <label for="validationCustom02">NIP</label>
                                    <input class="form-control <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom02"
                                        type="number" placeholder="NIP" name="nip" value="<?php echo e(old('nip')); ?>"
                                        required="">


                                    <?php $__errorArgs = ['nip'];
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
                                    <label for="validationCustom02">Image</label>
                                    <input class="form-control" id="validationCustom02" type="file" name="image"
                                        placeholder="Image" required="" accept="image/*" onchange="previewImage(event)">
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    <div class="pt-3 d-none" id="preview">
                                        <img src="<?php echo e(@$user->image ? '/uploads/' . @$user->image : '/assets/img/profile.png'); ?>"
                                            id="imagePreview" alt="" width="100" height="100"
                                            style="object-fit: cover; box-shadow: 0px 0px 3px 1px #ddd; border-radius: 5px;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Email</label>
                                    <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom01"
                                        type="email" placeholder="Email" name="email" required=""
                                        value="<?php echo e(old('email')); ?>">

                                    <?php $__errorArgs = ['email'];
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



                                <div class="col-md-6 mb-3 align-items-center">
                                    <label for="validationCustom01">Password</label>
                                    <input class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="validationCustom01" type="password" name="password"
                                        value="<?php echo e(old('password')); ?>" placeholder="Password" required="">
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="show-container">
                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Password Confirmation</label>
                                    <input class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="validationCustom02" type="password" placeholder="Password Confirmation"
                                        name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>"
                                        required="">


                                    <?php $__errorArgs = ['password'];
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
                            <a href="<?php echo e(route('admin')); ?>"><button class="btn btn-secondary"
                                    type="button">Cancel</button></a>

                            <button class="btn btn-primary" type="submit">Tambah</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('imagePreview');
            var container = document.getElementById('preview');

            container.classList.toggle('d-none')

            var files = input.files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (file.type.match('image.*')) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result
                    };

                    reader.readAsDataURL(file);
                } else {
                    var errorMessage = document.createElement('p');
                    errorMessage.style.color = 'red';
                    errorMessage.textContent = 'File tidak valid, pilih file gambar.';
                    preview.appendChild(errorMessage);
                }
            }

        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/owner/admin/add.blade.php ENDPATH**/ ?>
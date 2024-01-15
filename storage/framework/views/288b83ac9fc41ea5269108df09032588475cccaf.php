<?php $__env->startSection('title', 'Validation Forms'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Tambah Jabatan</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item">Jabatan</li>

<li class="breadcrumb-item active">add</li>
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
                                             <form novalidate="" method="POST" action="<?php echo e(route('store-jabatan')); ?>">
                                                      <?php echo csrf_field(); ?>
                                                      <div class="row">
                                                               <div class="col-md-6 mb-3">
                                                                        <label for="validationCustom01">Jabatan Name</label>
                                                                        <input class="form-control <?php $__errorArgs = ['jabatan_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom01" type="text" name="jabatan_name" placeholder="Nama Jabatan" required="" value="<?php echo e(old('jabatan_name')); ?>" name="jabatan_name">





                                                                        <?php $__errorArgs = ['jabatan_name'];
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
                                                      <a href="<?php echo e(route('jabatan')); ?>"><button class="btn btn-secondary" type="button">Cancel</button></a>


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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/admin/jabatan/add.blade.php ENDPATH**/ ?>
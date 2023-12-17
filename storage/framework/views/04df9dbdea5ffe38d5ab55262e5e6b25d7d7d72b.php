
<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
         .show-container {
                  position: absolute;
                  right: 0;
                  bottom: 30%;
                  /* Sesuaikan margin sesuai kebutuhan */
         }

</style>
<div class="container-fluid p-0">
         <div class="row m-0">
                  <div class="col-12 p-0">
                           <div class="login-card">
                                    <div class="w-100">
                                             
                                    <div class="login-main">
                                             <form class="theme-form">
                                                      <div class="form-group">
                                                               <label class="col-form-label">NIP</label>
                                                               <input class="form-control" type="number" required="" placeholder="11223344">
                                                      </div>
                                                      <div class="form-group">
                                                               <label class="col-form-label">Password</label>
                                                               <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                                               <div class="show-container">

                                                                        <div class="show-hide"><span class="show"></span></div>
                                                               </div>

                                                      </div>
                                                      <div class="form-group mb-0">
                                                               <button class="btn btn-primary btn-block form-control" type="submit">Sign in</button>
                                                      </div>
                                                      
                                                      <div class="social mt-4">
                                                               
                                                      </div>
                                             </form>
                                    </div>
                           </div>
                  </div>
         </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/karyawan/login/index.blade.php ENDPATH**/ ?>
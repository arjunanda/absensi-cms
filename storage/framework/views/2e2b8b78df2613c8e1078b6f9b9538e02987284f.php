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
<div class="container-fluid p-0 bg-light-primary">

         <div class="row m-auto bg-white position-relative" style='max-width: 500px;height: 100vh;'>

                  <div class="position-fixed bottom-0 border-top border-1" style="max-width: 500px;">
                           <div>
                                    <ul class="text-dark d-flex w-100 justify-content-around py-2">
                                             <li>
                                                      <a href=""><i data-feather="home"></i>Home</a>

                                             </li>
                                             <li>
                                                      <a href="">Cuti</a>

                                             </li>

                                             <li>
                                                      <a href="">History</a>

                                             </li>

                                             <li>
                                                      <a href="">Profile</a>

                                             </li>

                                    </ul>
                           </div>
                  </div>
         </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/karyawan/absen/index.blade.php ENDPATH**/ ?>
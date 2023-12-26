
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

                  <div class="position-fixed  border-top border-1" style="max-width: 500px;">
                           <div>
                                    <h1 class="text-center mt-2 fs-5 text-warning mt-4 mb-3">PT.Sertifikasi Instalasi Profesi Listrik Nusantara</h1>



                                    <div class="">
                                             <div class="d-flex justify-content-center align-items-center">
                                                      <img src="<?php echo e(asset('assets/images/avtar/3.jpg')); ?>" alt="" class="rounded-circle" style="width: 100px; height: 100px;">

                                             </div>


                                             <div class="text-center text-dark">
                                                      <p class="mb-0">nama karyawan</p>
                                                      <p class="mt-0">Shift Project 09:00 - 17:00</p>
                                             </div>

                                    </div>



                                    <div class="d-flex justify-content-evenly align-items-center mt-4 bg-light rounded" style="height:100px">
                                             <div class="text-center">
                                                      <img src="<?php echo e(asset('assets/svg-icon/bookmart.svg')); ?>" alt="" style="width:50px; height:50px;">
                                                      <p class="text-dark">Permohonan izin</p>
                                             </div>
                                             <div class="text-center">
                                                      <img src="<?php echo e(asset('assets/svg-icon/date-svgrepo-com.svg')); ?>" alt="" style="width:50px; height:50px;">
                                                      <p class="text-dark">History Kehadiran</p>
                                             </div>
                                             <div class="text-center">
                                                      <img src="<?php echo e(asset('assets/svg-icon/time-svgrepo-com.svg')); ?>" alt="" style="width:50px; height:50px;">

                                                      <p class="text-dark">Pengajuan Lembur</p>
                                             </div>

                                    </div>

                                    <div class="bg-light">
                                             <div class="text-dark text-center mt-4 pt-2">
                                                      <h3 class="fs-6">Kehadiran</h3>
                                             </div>

                                             <table class="table">
                                                      <p class="text-dark text-center">Hari ini Selasa 26 Desember 2023</p>


                                                      <thead>
                                                               <tr>

                                                                        <th scope="col">Foto </th>
                                                                        <th scope="col">Jam Masuk</th>
                                                                        <th scope="col">Foto </th>
                                                                        <th scope="col">Jam Keluar</th>
                                                               </tr>
                                                      </thead>
                                                      <tbody>
                                                               <tr>
                                                                        <td><img src="gambar1.jpg" alt="Gambar 1" style="width: 50px; height: 50px;"></td>
                                                                        <td>09:00 AM</td>
                                                                        <td><img src="gambar2.jpg" alt="Gambar 1" style="width: 50px; height: 50px;"></td>
                                                                        <td>05:00 PM</td>
                                                               </tr>

                                                      </tbody>
                                             </table>


                                    </div>



                                    <div class="d-grid gap-4 col-8 mx-auto mt-5">
                                             <button class="btn btn-warning" type="button">Rekam Kehadiran </button>
                                    </div>




                           </div>

                  </div>
         </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/karyawan/absen/index.blade.php ENDPATH**/ ?>
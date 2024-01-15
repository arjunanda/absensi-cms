<?php $__env->startSection('title', 'Product Page'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/rating.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Permohonan Ijin</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Permohonan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div>
      <div class="row product-page-main p-0">
         <div class="col-md-12 md-100 box-col-12">
            <div class="card">
               <div class="card-body">
                  <div class="product-page-details">
                     <h3><?php echo e($data->users->name); ?></h3>
                  </div>
                  <hr>
                  <p><?php echo e($data->description); ?></p>
                  <hr>
                  <div>
                     <table class="product-page-width">
                        <tbody>
                           <tr>
                              <td> <b>Type</b></td>
                              <td class="px-3"> <b>:</b></td>
                              <td><?php echo e($data->type); ?></td>
                           </tr>
                           <tr>
                              <td> <b>Awal Ijin</b></td>
                              <td class="px-3"> <b>:</b></td>
                              <td><?php echo e($data->awal_cuti); ?></td>
                           </tr>
                           <tr>
                              <td> <b>Akhir Ijin</b></td>
                              <td class="px-3"> <b>:</b></td>
                              <td><?php echo e($data->akhir_cuti); ?></td>
                           </tr>
                           <tr>
                              <td> <b>Jumlah Cuti</b></td>
                              <td class="px-3"> <b>:</b></td>
                              <td><?php echo e($data->jumlah_cuti); ?></td>
                           </tr>
                           <tr>
                            <td> <b>Status</b></td>
                            <td class="px-3"> <b>:</b></td>
                            <td><?php echo e($data->status == 'inapprove' ? 'Canceled' : ($data->status == "pending" ? 'Pending' : 'Approved')); ?></td>
                         </tr>
                        </tbody>
                     </table>
                  </div>
                  <hr>
                  <div class="m-t-15">

                      <form method="POST" action="<?php echo e(route('change_permohonan_status', ['id' => $data->id])); ?>">

                        <?php echo csrf_field(); ?>
                        <a href=<?php echo e(route('permohonan')); ?>><button class="btn btn-dark m-r-10" type="button" title="">Back</button></a>

                        <?php if($data->status == 'pending'): ?>

                            <button class="btn btn-danger m-r-10" type="submit" name="status" title="" value="inapprove">Cancel</button>
                            <button class="btn btn-success m-r-10" type="submit" name="status" title="" value="approve">Approve</button>
                        <?php endif; ?>

                      </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/rating/jquery.barrating.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/rating/rating-script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/ecommerce.js')); ?>"></script>

<script>
    // $(document).ready(function() {
        function ChangeStatus(status) {
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('change_permohonan_status', ['id' => $data->id])); ?>",
                datatype: 'json',
                data: {
                    'status': status,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response)
                }
            })
        }
    // })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/admin/permohonan/detail.blade.php ENDPATH**/ ?>
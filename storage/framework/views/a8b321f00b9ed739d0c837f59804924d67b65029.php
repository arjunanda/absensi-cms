
<?php $__env->startSection('title', 'Bootstrap Basic Tables'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Jabatan Lists</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Jabatan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
         <div class="row">

                  <div class="col-md-12 project-list">
                           <div class="card">
                                    <div class="row">
                                             <div class="col-md-6">

                                             </div>
                                             <div class="col-md-6">
                                                      <div class="form-group mb-0 me-0"></div>
                                                      <a class="btn btn-primary" href="<?php echo e(route('add-jabatan')); ?>"> <i data-feather="plus-square"> </i>Tambah Jabatan</a>
                                             </div>
                                    </div>
                           </div>
                  </div>

                  <div class="col-sm-12">
                           <div class="card">
                                    <div class="card-body">
                                             <div class="col-md-12 mb-3">
                                                      <?php if(session('success')): ?>
                                                      <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                                               <center>

                                                                        <strong class="text-center"><?php echo e(session('success')); ?></strong>



                                                               </center>
                                                               <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                                      </div>
                                                      <?php endif; ?>


                                             </div>

                                             <div class="table-responsive">
                                                      <table id="jabatan-table" class="display datatables">
                                                               <thead>
                                                                        <tr>
                                                                                 <th scope="col">No</th>
                                                                                 <th scope="col">Jabatan</th>
                                                                                 <th scope="col">Jumlah Karyawan</th>
                                                                                 <th scope="col">Action</th>
                                                                        </tr>
                                                               </thead>
                                                               
                                                      </table>
                                             </div>
                                    </div>
                           </div>
                  </div>
         </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>

<script>
         $(document).ready(function() {
                  $('#jabatan-table').DataTable({
                           processing: true
                           , serverSide: true
                           , ajax: {
                                    url: '<?php echo e(url("/dashboard/get-jabatan")); ?>'

                                    , type: 'GET'
                           , }
                           , columns: [{
                                             data: 'no'
                                             , name: 'no'
                                    }
                                    , {
                                             data: 'jabatan'
                                             , name: 'jabatan'
                                    }
                                    , {
                                             data: 'jumlah_karyawan'
                                             , name: 'jumlah_karyawan'


                                    }, {
                                             data: null
                                             , searchable: false
                                             , orderable: false
                                             , render: function(data, type, row) {
                                                      return '<a href="/dashboard/jabatan/edit/' + row.id + '"><button class="btn btn-success">Edit</button></a> ' +


                                                               ' <button type="button" class="btn btn-danger">Delete</button>';

                                             }
                                             , width: '150px'

                                    }
                           , ]
                  , });
         });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/admin/jabatan/index.blade.php ENDPATH**/ ?>
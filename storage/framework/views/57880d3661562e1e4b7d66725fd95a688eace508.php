
<?php $__env->startSection('title', 'Bootstrap Basic Tables'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Permohonan Lists</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Permohonan lists</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            <?php if(session('success')): ?>
                                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                    <center>

                                        <strong class="text-center"><?php echo e(session('success')); ?></strong>



                                    </center>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>


                        </div>

                        <div class="table-responsive">
                            <table id="permohonan-table" class="display datatables">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Tanggal Awal Ijin</th>
                                        <th scope="col">Tanggal Akhir Ijin</th>
                                        <th scope="col">Status</th>
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
            $('#permohonan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '<?php echo e(url('/dashboard/get-permohonan')); ?>',
                    type: 'GET',
                },
                columns: [{
                    data: 'no',
                    name: 'no'
                }, {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'type',
                    name: 'type'
                }, {
                    data: 'awal_cuti',
                    name: 'awal_cuti'

                }, {
                    data: 'akhir_cuti',
                    name: 'akhir_cuti'

                }, {
                    data: null,
                    render: function(data, type, row) {

                        if (data.status == 'inapprove') {

                            return '<span class="font-danger">Canceled</span>'
                        }
                        if (data.status == 'approve') {

                            return '<span class="font-success">Approved</span>'
                        }
                        if (data.status == 'pending') {

                            return '<span class="font-info">Pending</span>'
                        }
                    }

                }, {
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function(data, type, row) {
                        return '<a href="/dashboard/permohonan/detail/' + row.id +
                            '"><button class="btn btn-success">Detail</button></a> ';

                    },
                    width: '150px'

                }, ],
            });
            setTimeout(() => {
                $('.btn-close').click();
            }, 3000);
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/admin/permohonan/index.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title', 'Bootstrap Basic Tables'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Karyawan Lists</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Karyawan</li>
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
                            <a class="btn btn-primary" href="<?php echo e(route('add-karyawan')); ?>"> <i data-feather="plus-square">
                                </i>Tambah Karyawan</a>
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
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <?php if(session('error')): ?>
                                <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                                    <center>

                                        <strong class="text-center"><?php echo e(session('error')); ?></strong>



                                    </center>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            <?php endif; ?>


                        </div>

                        <div class="table-responsive">
                            <table id="users-table" class="display datatables">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nip</th>
                                        <th scope="col">Jabatan</th>
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
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '<?php echo e(url('/dashboard/get-karyawan')); ?>'

                        ,
                    type: 'GET',
                },
                columns: [{
                    data: 'no',
                    name: 'no'
                }, {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'nip',
                    name: 'nip'
                }, {
                    data: 'jabatan_name',
                    name: 'jabatan_name'

                }, {
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function(data, type, row) {
                        return '<div  class="d-flex flex-wrap justify-content-start"><a href="/dashboard/karyawan/edit/' + row.id +
                            '"><button class="btn btn-success " style="margin-top: 2px; margin-right: 5px;">Edit</button></a> ' +

                            '<form action="/dashboard/karyawan/delete/' + row.id + '" method="POST" class="delete-form" style="margin-top: 2px;">' +
                    '<?php echo csrf_field(); ?>' +
                    '<?php echo method_field("DELETE"); ?>' +
                    '<button type="button" class="btn btn-danger delete-btn">Delete</button>' +
                    '</form> </div>';

                    },
                    width: '150px'

                }, ],
            });

            $('#users-table').on('click', '.delete-btn', function() {
                var form = $(this).closest('form');

                // Konfirmasi penghapusan (gunakan sweetalert atau konfirmasi sesuai kebutuhan)
                if (confirm('Apakah kamu yakin menghapus karyawan ini?')) {
                    // Kirim formulir penghapusan
                    form.submit();
                }
            });
            setTimeout(() => {
                $('.btn-close').click();
            }, 3000);
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/admin/karyawan/index.blade.php ENDPATH**/ ?>
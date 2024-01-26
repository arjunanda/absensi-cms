<?php $__env->startSection('title', 'Product Page'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/rating.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Detail Absen</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Detail Absen</li>
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
                            <div>
                                <div style="margin-top: 10px;">

                                    <div>

                                        <table class="product-page-width">
                                            <tbody>
                                                <tr>
                                                    <td style="padding-bottom: 10px;"> <b>Tanggal</b></td>
                                                    <td style="padding-bottom: 10px;" class="px-3"> <b>:</b></td>
                                                    <td style="padding-bottom: 10px;"><?php echo e(\Carbon\Carbon::parse($data->tanggal_checkin)->format('d M Y')); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 20px 0px;"> <b>Check In</b></td>
                                                    <td style="padding: 20px 0px;" class="px-3"> <b>:</b></td>
                                                    <td style="padding: 20px 0px;"><?php echo e(@$data->check_in ? \Carbon\Carbon::parse(@$data->check_in)->format('H:i') : '-'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td> <b>Foto Check In</b></td>
                                                    <td class="px-3"> <b>:</b></td>
                                                    <td><?php if(@$data->image_checkin): ?><img src="/uploads/<?php echo e(@$data->image_checkin); ?>" alt="" width="80" height="80" class="shadow" style="object-fit: cover; border-radius: 10px;"> <?php else: ?> - <?php endif; ?></td>
                                                </tr>

                                                <tr>
                                                    <td style="padding: 20px 0px;"> <b>Check Out</b></td>
                                                    <td style="padding: 20px 0px;" class="px-3"> <b>:</b></td>
                                                    <td style="padding: 20px 0px;"><?php echo e(\Carbon\Carbon::parse($data->check_out)->format('H:i')); ?></td>
                                                </tr>
                                                <tr>
                                                    <td> <b>Foto Check Out</b></td>
                                                    <td class="px-3"> <b>:</b></td>
                                                    <td><?php if(@$data->image_checkout): ?><img src="/uploads/<?php echo e(@$data->image_checkout); ?>" alt="" width="80" height="80" class="shadow" style="object-fit: cover; border-radius: 10px;"> <?php else: ?> - <?php endif; ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="m-t-15">

                                <a href=<?php echo e(route('presensi.owner')); ?>><button class="btn btn-dark m-r-10" type="button"
                                        title="">Back</button></a>

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
                success: function(response) {
                    console.log(response)
                }
            })
        }
        // })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/owner/presensi/detail.blade.php ENDPATH**/ ?>
<?php $__env->startSection('karyawan_content'); ?>
    <div class="position-fixed  border-top border-1 p-0" style="max-width: 500px;">
        <div>
            <nav class="navbar navbar-dark bg-transparent px-3" style="box-shadow: 0px 1px 3px 0px #ccc;">
                <div class="w-100 d-flex flex-row justify-content-between align-items-center">
                    <button class="btn btn-link text-dark px-0 py-0" onclick="goBack()">
                        <i class="fa fa-arrow-circle-left fa-2x"></i>
                    </button>
                    <span class="navbar-brand mb-0 h1 text-warning">History</span>
                </div>
            </nav>

            <div class="px-3 py-2 pb-5 overflow-auto" style="max-height: 95vh;">

                <form action="<?php echo e(route('filter_history')); ?>" method="POST" id="filterForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="startDate" class="font-dark">Filter Tanggal Awal</label>
                                <input class="form-control" id="startDate" type="date" name="start_date" required=""
                                    value="<?php echo e(old('start_date') ?? @$start_date); ?>">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="endDate" class="font-dark">Filter Tanggal Akhir</label>
                                <input class="form-control" id="endDate" type="date" name="end_date" required=""
                                    value="<?php echo e(old('end_date') ?? @$end_date); ?>">
                            </div>
                        </div>
                    </div>
                </form>

                <?php $__currentLoopData = $absensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="py-2">

                        <div class="bg-light w-100 h-100 py-2 px-2 d-flex justify-content-between align-items-center"
                            style="border-radius: 8px; box-shadow: 1px 1px 3px 0px #ccc;">
                            <div class="text-dark">

                                <h6><i class="fa fa-calendar"></i> <?php echo e($item['tanggal_checkin']); ?></h6>
                                <span style="font-size: 13px;"><i class="fa fa-clock-o"></i> Masuk:
                                    <?php echo e((new DateTime($item['check_in']))->format('H:i')); ?> | <i class="fa fa-clock-o"></i>
                                    Pulang: <?php echo e((new DateTime($item['check_out']))->format('H:i')); ?></span>
                            </div>
                            <div class="text-dark px-2">
                                <?php if((new DateTime($setting->check_in))->format('H:i') >= (new DateTime($item['check_in']))->format('H:i')): ?>
                                    <b class="text-success">ONTIME</b>
                                <?php else: ?>
                                    <b class="text-danger">LATE</b>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
    <script>
        function goBack() {

            window.location.href = '/';
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Mendapatkan elemen input end_date
            var endDateInput = document.getElementById('endDate');
            var startDateInput = document.getElementById('startDate');

            // Menambahkan event listener untuk mendengarkan perubahan pada input end_date
            console.log(endDateInput.value)
            endDateInput.addEventListener('change', function() {

                // Mendapatkan formulir

                if (startDateInput.value !== '') {

                    var filterForm = document.getElementById('filterForm');

                    // Mengirim formulir
                    filterForm.submit();
                }
            });

            startDateInput.addEventListener('change', function() {

                // Mendapatkan formulir

                if (endDateInput.value !== '') {

                    var filterForm = document.getElementById('filterForm');

                    // Mengirim formulir
                    filterForm.submit();
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('karyawan.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/karyawan/absen/history.blade.php ENDPATH**/ ?>
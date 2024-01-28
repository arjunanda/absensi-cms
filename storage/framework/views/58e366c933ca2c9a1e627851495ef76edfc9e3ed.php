


<?php $__env->startSection('karyawan_content'); ?>
    <div class="position-fixed  border-top border-1 p-0" style="max-width: 500px;">
        <div>
            <nav class="navbar navbar-dark bg-transparent px-3" style="box-shadow: 0px 1px 3px 0px #ccc;">
                <div class="w-100 d-flex flex-row justify-content-between align-items-center">
                    <button class="btn btn-link text-dark px-0 py-0" onclick="goBack()">
                        <i class="fa fa-arrow-circle-left fa-2x"></i>
                    </button>
                    <span class="navbar-brand mb-0 h1 text-warning">Permohonan Izin</span>
                </div>
            </nav>
            <div class="px-3 py-3">

                <form novalidate="" action="<?php echo e(route('store_permohonan')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01 " class="font-dark">Tanggal Awal</label>
                            <input class="form-control <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom01"
                                type="date" name="start_date" placeholder="Tanggal Awal" required=""
                                value="<?php echo e(old('start_date')); ?>" name="start_date">


                            <?php $__errorArgs = ['start_date'];
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

                        <div class="col-md-12 mb-3">
                            <label for="validationCustom02 " class="font-dark">Tanggal Akhir</label>
                            <input class="form-control <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom02"
                                type="date" name="end_date" placeholder="Tanggal Akhir" required=""
                                value="<?php echo e(old('end_date')); ?>" name="end_date">


                            <?php $__errorArgs = ['end_date'];
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
                        <div class="col-md-12 mb-3">
                            <label class="form-label font-dark" for="type">
                                Tipe Izin
                            </label>

                            <select class="form-control <?php $__errorArgs = ['type_izin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="type" name="type_izin">

                                <option value="0">--Select--</option>
                                <option value="sakit">Sakit</option>
                                <option value="cuti">Cuti</option>

                            </select>
                            <?php $__errorArgs = ['type_izin'];
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
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom03" class=" font-dark">Alasan</label>
                            <textarea class="form-control <?php $__errorArgs = ['alasan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="validationCustom03" type="text"
                                placeholder="Alasan" name="alasan" required="" value="<?php echo e(old('alasan')); ?>" rows="5"></textarea>

                            <?php $__errorArgs = ['alasan'];
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
                    <div class="text-center">

                        <button class="btn btn-secondary" type="submit" >Buat Permohonan</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
    <script>
        function upload(absen) {

            var startDateInput = document.getElementById('validationCustom01');
            var endDateInput = document.getElementById('validationCustom02');
            var typeInput = document.getElementById('type');
            var alasanInput = document.getElementById('validationCustom03');


            var formData = new FormData();
            // Tambahkan nilai input ke FormData
            formData.append('start_date', startDateInput.value);
            formData.append('end_date', endDateInput.value);
            formData.append('type', typeInput.value);
            formData.append('alasan', alasanInput.value);

            // Tambahkan _token jika diperlukan
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));


            console.log($('meta[name="csrf-token"]').attr('content'))
            $.ajax({
                url: '/store-permohonan',
                type: 'POST',
                contentType: false,
                processData: false,
                data: formData,
                success: function(response) {
                    console.log(response, 'Ini response')

                    if (response.valid) {

                        $.notify({
                            title: absen === 'masuk' ? '<strong>Permohonan berhasil!!</strong>' :
                                '<strong>Data Permohonan berhasil dikirim!!</strong>',
                            message: response.message
                        }, {
                            type: 'success',
                            allow_dismiss: true,
                            newest_on_top: false,
                            mouse_over: false,
                            showProgressbar: true,
                            spacing: 10,
                            timer: 500,
                            placement: {
                                from: 'top',
                                align: 'center'
                            },
                            offset: {
                                x: 30,
                                y: 30
                            },
                            delay: 1700,
                            z_index: 10000,
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            }
                        });

                        setTimeout(() => {
                            window.location.href = '/'
                        }, 2000);
                    } else {
                        $.notify({
                            title: absen === 'masuk' ? '<strong>Permohonan gagal!!</strong>' :
                                '<strong>Data Permohonan gagal dikirim!!</strong>',
                            message: response.message
                        }, {
                            type: 'danger',
                            showProgressbar: true,
                            allow_dismiss: true,
                            newest_on_top: false,
                            mouse_over: false,
                            spacing: 10,
                            delay: 1700,
                            timer: 500,
                            placement: {
                                from: 'top',
                                align: 'center'
                            },
                            offset: {
                                x: 30,
                                y: 30
                            },
                            z_index: 10000,
                            animate: {
                                enter: 'animated fadeInDown',
                                exit: 'animated fadeOutUp'
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error uploading file. Status: ' + status);
                }
            });
        }

        function goBack() {

            window.location.href = '/';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('karyawan.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fajar\Documents\absensi-cms\resources\views/karyawan/absen/cuti.blade.php ENDPATH**/ ?>
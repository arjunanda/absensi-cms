<!-- resources/views/laporan-kehadiran.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laporan Kehadiran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Sesuaikan dengan gaya yang diinginkan -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th,.table td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
            color: #333;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
        <h2 class="text-center">Laporan Kehadiran</h2>

        <div class="info-section">


            <table>
                <tr>
                    <td><strong>Nama</strong> </td>
                    <td style="padding-right: 5px; padding-left: 15px;"><strong>:</strong></td>
                    <td><?php echo e($user->name); ?></td>
                </tr>
                <tr>
                    <td><strong>Nip</strong> </td>
                    <td style="padding-right: 5px; padding-left: 15px;"><strong>:</strong></td>
                    <td><?php echo e($user->nip); ?></td>
                </tr>
                <tr>
                    <td><strong>Jabatan</strong> </td>
                    <td style="padding-right: 5px; padding-left: 15px;"><strong>:</strong></td>
                    <td style="text-transform: uppercase;"><?php echo e($user->jabatans->jabatan); ?></td>
                </tr>
                <tr>
                    <td><strong>Periode Kehadiran</strong> </td>
                    <td style="padding-right: 5px; padding-left: 15px;"><strong>:</strong></td>
                    <td ><?php echo e(\Carbon\Carbon::parse($tanggal_start)->format('d M Y')); ?> - <?php echo e(\Carbon\Carbon::parse($tanggal_end)->format('d M Y')); ?></td>
                </tr>
            </table>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <!-- Sesuaikan dengan kolom-kolom lainnya -->
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(\Carbon\Carbon::parse($data->tanggal_checkin)->format('d M Y')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($data->check_in)->format('H:i')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($data->check_out)->format('H:i')); ?></td>
                        <!-- Sesuaikan dengan kolom-kolom lainnya -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3">Tidak ada data kehadiran.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if(!$presensi->isEmpty()): ?>

            <table style="padding: 10px;border-collapse: collapse; border: 1px solid #ddd;">
                <tr>
                    <td style="padding-left: 10px; padding-top: 5px;">Cuti</td>
                    <td style="padding: 0px 15px; padding-top: 5px;">:</td>
                    <td style="padding-right: 15px;padding-top: 5px;"><?php echo e($jumlah_cuti); ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 10px">Sakit </td>
                    <td style="padding: 0px 15px;">:</td>
                    <td style="padding-right: 15px"><?php echo e($jumlah_sakit); ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 10px; padding-bottom: 5px;">Tidak Masuk </td>
                    <td style="padding: 0px 15px;  padding-bottom: 5px;">:</td>
                    <td style="padding-right: 15px; padding-bottom: 5px;"><?php echo e($tidak_masuk); ?></td>
                </tr>
            </table>
        <?php endif; ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH /home/redtech/development/website/Laravel/cuba_starter_kit/resources/views/admin/presensi/download.blade.php ENDPATH**/ ?>
<?php

namespace Database\Seeders;

use App\Models\PermohonanModels;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermohonanSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permohonan = [
            [
                'id'             => 1,
                'user_id' => 2,
                'type'     =>  'cuti',
                'awal_cuti' => Carbon::create(2024, 1, 12),
                'akhir_cuti' => Carbon::create(2024, 1, 20),
                'jumlah_cuti' => 8,
                'description' => 'Alasan saya mengajukan cuti ini adalah untuk mempersiapkan diri sebaik mungkin guna menghadapi sidang kuliah tersebut. Saya menyadari pentingnya kehadiran dan keterlibatan saya dalam sidang ini, dan dengan penuh tanggung jawab, saya akan memastikan agar tugas dan tanggung jawab saya selama cuti dapat dijalankan sebaik mungkin. Saya sangat berharap untuk mendapatkan izin cuti ini agar dapat fokus dan memberikan yang terbaik dalam mengikuti sidang kuliah. Saya bersedia menyelesaikan tugas-tugas yang tertunda dan memastikan bahwa tidak ada gangguan dalam proses akademik saya selama izin cuti. Terlampir ini adalah bukti-bukti atau surat-surat yang mendukung permohonan izin cuti saya ini. Saya sangat berterima kasih atas perhatian dan pemahaman dari pihak fakultas. Semoga permohonan ini dapat segera diproses dan mendapatkan persetujuan. Atas perhatian dan izin yang diberikan, saya mengucapkan terima kasih.',
                'status' => 'pending',
                'created_at'     =>  date('Y-m-d H:i:s'),

            ]
        ];

        PermohonanModels::insert($permohonan);
    }
}

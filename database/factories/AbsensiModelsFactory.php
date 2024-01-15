<?php

namespace Database\Factories;

use App\Models\AbsensiModels;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsensiModelsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AbsensiModels::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $tanggal_checkin;

        // Jika $tanggal_checkin belum diisi atau sudah mencapai batas akhir rentang waktu, mulai dari awal lagi
        $tanggal_checkin = $tanggal_checkin ?? $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d');

        // Menggunakan waktu acak untuk check_in
        $check_var = $this->faker->dateTimeBetween($tanggal_checkin . ' 00:00:00', $tanggal_checkin . ' 23:59:59')->format('H:i:s');
        $check_in = $this->faker->dateTimeBetween($tanggal_checkin . ' 00:00:00', $tanggal_checkin . ' 23:59:59')->format('Y-m-d H:i:s');

        // Membuat check_out lebih besar dari check_in
        // $check_out = $this->faker->dateTimeBetween($tanggal_checkin . ' ' . $check_var, $tanggal_checkin . ' 23:59:59')->format('Y-m-d H:i:s');

        do {
            $check_out = $this->faker->dateTimeBetween($tanggal_checkin . ' ' . $check_var, $tanggal_checkin . ' 23:59:59')->format('Y-m-d H:i:s');
        } while ($check_out <= $check_in);
        // Menyesuaikan tanggal_checkin untuk iterasi berikutnya
        $tanggal_checkin = date('Y-m-d', strtotime($tanggal_checkin . ' +1 day'));

        return [
            'user_id' => 2,
            'tanggal_checkin' => $tanggal_checkin,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'status' => true,
            'created_at'     =>  date('Y-m-d H:i:s'),
        ];
    }
}

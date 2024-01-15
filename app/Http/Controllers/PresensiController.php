<?php

namespace App\Http\Controllers;

use App\Models\AbsensiModels;
use App\Models\PermohonanModels;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDO;

class PresensiController extends Controller
{
    //

    public function index()
    {


        return view('admin.presensi.index');
    }

    public function detail($id)
    {
        $absensi = AbsensiModels::with('users')->find($id);

        $data = [
            'data' => $absensi
        ];

        return view('admin.presensi.detail', $data);
    }

    public function createReport()
    {
        $users = User::where('role_id', '2')->get();

        $data = [
            'users' => $users
        ];

        return view('admin.presensi.laporan', $data);
    }

    public function storeReport(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required'
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/presensi/create-laporan')
                ->withErrors($validator)
                ->withInput();
        }


        $start = $request->input('start_date');
        $end = $request->input('end_date');
        $id = $request->input('user_id');


        // dd($id);

        $user = User::with('jabatans')->find($id);

        $presensi = AbsensiModels::with('users')->where('user_id', $id)->where('tanggal_checkin', '>=', $start)
            ->where('tanggal_checkin', '<=', $end)
            ->whereNotNull('check_out')
            ->get();

        // Menyaring hasil query untuk menghilangkan Sabtu dan Minggu
        $filteredPresensi = $presensi->filter(function ($item) {
            // Mendapatkan hari dalam bentuk angka (1 untuk Minggu, 2 untuk Senin, dst.)
            $dayOfWeek = (new DateTime($item->tanggal_checkin))->format('N');

            // Mengecualikan hari Sabtu (6) dan Minggu (7)
            return !in_array($dayOfWeek, [6, 7]);
        });


        $querySakit = PermohonanModels::where('user_id', $id)->where('status', 'approve')
            ->where('type', 'sakit')
            ->where('awal_cuti', '>', $start)
            ->where('awal_cuti', '<', $end)
            ->get();

            $selisihHari = 0;


        foreach ($querySakit as $key => $value) {


            if ($value->akhir_cuti == null) {

                $data = $presensi->filter(function ($item) use ($value) {
                    // Filter tanggal dalam $presensi yang lebih besar dari tanggal awal cuti
                    return (new DateTime($item->tanggal_checkin))->format('Y-m-d') > $value->awal_cuti;
                });

                if ($data->isNotEmpty()) {
                    $tanggalCheckinPertama = new DateTime($data->first()->tanggal_checkin);
                    $awalCuti = new DateTime($value->awal_cuti);
                    $selisihHari = $tanggalCheckinPertama->diff($awalCuti)->days;
                }


            }
        }


        $queryCuti = PermohonanModels::where('user_id', $id)->where('status', 'approve')
            ->where('type', 'cuti')
            ->where('awal_cuti', '>', $start)
            ->where('awal_cuti', '<', $end)
            ->get();

            $selisihHariCuti = 0;


        foreach ($queryCuti as $key => $value) {


            if ($value->akhir_cuti == null) {

                $data = $presensi->filter(function ($item) use ($value) {
                    // Filter tanggal dalam $presensi yang lebih besar dari tanggal awal cuti
                    return (new DateTime($item->tanggal_checkin))->format('Y-m-d') > $value->awal_cuti;
                });

                if ($data->isNotEmpty()) {
                    $tanggalCheckinPertama = new DateTime($data->first()->tanggal_checkin);
                    $awalCuti = new DateTime($value->awal_cuti);
                    $selisihHariCuti = $tanggalCheckinPertama->diff($awalCuti)->days;
                }


            }
        }

        $sakit = PermohonanModels::where('status', 'approve')->where('status', 'sakit')->where('awal_cuti', '>=', $start)
            ->where('awal_cuti', '<=', $end)->count();
        $cuti = PermohonanModels::where('status', 'approve')->where('status', 'cuti')->where('awal_cuti', '>=', $start)
            ->where('awal_cuti', '<=', $end)->count();
        $tidak_masuk = $this->hitungHariTanpaWeekend($start, $end) - count($filteredPresensi);

        $sakit = $sakit == 0 ? $selisihHari : $sakit;
        $cuti = $cuti == 0 ? $selisihHariCuti : $cuti;

        $data = [
            'user' => $user,
            'presensi' => $filteredPresensi,
            'tanggal_start' => $start,
            'tanggal_end' => $end,
            'jumlah_sakit' => $sakit,
            'jumlah_cuti' => $cuti,
            'tidak_masuk' => $tidak_masuk - $cuti - $sakit
        ];

        // $pdf = Pdf::loadView('admin.presensi.download', $data);
        // return $pdf->download('laporan.pdf');

        return view('admin.presensi.download', $data);
    }

    public function getDataPresensi(Request $request)
    {

        $perPage = $request->input('length', 10);
        $page = $request->input('start', 0) / $perPage + 1;

        $presensi = AbsensiModels::orderBy('id', 'DESC')->paginate($perPage, ['*'], 'page', $page);


        $data = $presensi->map(function ($item, $key) use ($page, $perPage) {
            return [
                'no' => ($page - 1) * $perPage + $key + 1,
                'id' => $item->id,
                'name' => optional($item->users)->name,
                'tanggal_checkin' => $item->tanggal_checkin,
                'check_in' => $item->check_in,
                'check_out' => $item->check_out,
            ];
        });


        return response()->json(['data' => $data, 'recordsFiltered' => $presensi->total(), 'recordsTotal' => $presensi->total()]);
    }

    protected function getDayOfWeekFunction($columnName)
    {
        $driver = DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME);

        switch ($driver) {
            case 'mysql':
                return "DAYOFWEEK($columnName)";
            case 'pgsql':
                return "EXTRACT(DOW FROM $columnName)";
            default:
                throw new \Exception("Unsupported database driver: $driver");
        }
    }

    protected function hitungHariTanpaWeekend($start, $end)
    {
        $jumlahHari = 0;

        $tanggalIterasi = new DateTime($start);

        while ($tanggalIterasi <= new DateTime($end)) {
            $dayOfWeek = $tanggalIterasi->format('N'); // Mendapatkan hari dalam bentuk angka (1 untuk Senin, 2 untuk Selasa, dst.)

            // Hanya menambahkan jumlah hari jika bukan Sabtu (6) atau Minggu (7)
            if ($dayOfWeek != 6 && $dayOfWeek != 7) {
                $jumlahHari++;
            }

            // Menambahkan satu hari ke tanggal iterasi
            $tanggalIterasi->modify('+1 day');
        }

        return $jumlahHari;
    }
}

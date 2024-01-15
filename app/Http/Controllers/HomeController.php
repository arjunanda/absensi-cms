<?php

namespace App\Http\Controllers;

use App\Models\AbsensiModels;
use App\Models\PermohonanModels;
use App\Models\SettingModels;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //

    public function index()
    {
        $today = Carbon::now();

        // user
        $user = Auth::user();

        // setting
        $setting = SettingModels::find(1);


        // Ganti bahasa menjadi Indonesia
        Carbon::setLocale('id');

        // Format tanggal sesuai keinginan
        $formattedDate = $today->translatedFormat('l d F Y');

        $today = $today->toDateString();



        $check_in = Carbon::createFromFormat('H:i:s', $setting->check_in);
        $check_out = Carbon::createFromFormat('H:i:s', $setting->check_out);
        $absensi = AbsensiModels::with(['users', 'users.jabatans'])->where('user_id', $user->id)->where('tanggal_checkin', $today)->first();

        $data = [
            'date' => $formattedDate,
            'user' => $user,
            'setting' => [
                'check_in' => $check_in->format('H:i'),
                'check_out' => $check_out->format('H:i')
            ],
            'absensi' => [
                'check_in' => @@$absensi->check_in ? Carbon::createFromFormat('Y-m-d H:i:s', $absensi->check_in)->format('H:i') : null,
                'check_out' => @@$absensi->check_out ? Carbon::createFromFormat('Y-m-d H:i:s', $absensi->check_out)->format('H:i') : null,
                'image_checkin' => @@$absensi->image_checkin,
                'image_checkout' => @@$absensi->image_checkout
            ]
        ];

        return view('karyawan.absen.index', $data);
    }

    public function viewAbsen()
    {
        $user = Auth::user();

        $now = Carbon::now();
        $today = $now->toDateString();

        $absensi = AbsensiModels::where('user_id', $user->id)->where('tanggal_checkin', $today)
            ->first();

        $users = User::with('jabatans')->find($user->id);

        $data = [
            'user' => $users,
            'absensi' => $absensi
        ];

        return view('karyawan.absen.rekam-kehadiran', $data);
    }

    public function absen(Request $request)
    {
        if ($request->has('image')) {
            $user = Auth::user();

            $base64Image = $request->input('image');
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

            $imageName = time() . '.png'; // Atur ekstensi sesuai kebutuhan
            $imagePath = public_path('uploads/' . $imageName);


            // Simpan gambar

            $now = Carbon::now();
            $today = $now->toDateString();
            $currentTime = $now->timestamp;

            $existingAbsensi = AbsensiModels::where('user_id', $user->id)->where('tanggal_checkin', $today)
                ->first();


            if ($existingAbsensi) {

                try {
                    //code...
                    $existingAbsensi->update([
                        'check_out' => $now->format('Y-m-d H:i:s'),
                        'image_checkout' => $imageName,
                    ]);
                    File::put($imagePath, $imageData);


                    return response()->json([
                        'valid' => true,
                        'message' => "Terima kasih atas kerja keras Anda hari ini."
                    ]);
                } catch (\Throwable $th) {
                    //throw $th;

                    return response()->json([
                        'valid' => false,
                        'message' => 'Silahkan hubungi Administrator.'
                    ]);
                }
            } else {

                try {
                    AbsensiModels::create([
                        'user_id' => $user->id,
                        'check_in' => $now->format('Y-m-d H:i:s'),
                        'tanggal_checkin' => $today,
                        'image_checkin' => $imageName,
                    ]);

                    File::put($imagePath, $imageData);


                    return response()->json([
                        'valid' => true,
                        'message' => 'Anda telah berhasil check-in pada ' . $now->format('H:i') . ' hari ini.'
                    ]);
                } catch (\Throwable $th) {
                    //throw $th;
                    return response()->json([
                        'valid' => false,
                        'message' => $th
                    ]);
                }
            }
        } else {
            return response()->json([
                'valid' => false,
                'message' => 'Tidak ada gambar yang dikirim.'
            ]);
        }
    }

    public function history(Request $request)
    {
        // dd($request->input('page'));

        $user = Auth::user();

        $absensi = AbsensiModels::where('user_id', $user->id)->whereNotNull('check_out')->paginate(50, ['*'], 'name', $request->input('page') ?? 1);


        if (@$request->input('start_date') && @$request->input('end_date')) {

            $absensi = AbsensiModels::where('user_id', $user->id)->where('tanggal_checkin', '>=', $request->input('start_date'))
                ->where('tanggal_checkin', '<=', $request->input('end_date'))->whereNotNull('check_out')->paginate(50, ['*'], 'name', $request->input('page') ?? 1);
        }


        $data = [
            'absensi' => $absensi,
            'setting' => SettingModels::find(1),
            // 'start_date' => @$request->input('start_date'),
            // 'end_date' => @$request->input('end_date')

        ];

        return view('karyawan.absen.history', $data);
    }


    public function cuti()
    {
        return view('karyawan.absen.cuti');
    }

    public function storeCuti(Request $request)
    {

        if ($request->input('type_izin') == 0) {
            $request->merge(['type_izin' => null]);
        }

        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'type_izin' => 'required',
            'alasan' => 'required',
        ]);
        // dd($validator);


        if ($validator->fails()) {

            return redirect('/permohonan_izin')
                ->withErrors($validator)
                ->withInput();
        }


        $selisihHari = 0;

        if ($request->input('end_date')) {

            $tanggalAwal = Carbon::parse($request->input('start_date'));
            $tanggalAkhir = Carbon::parse($request->input('end_date'));

            $selisihHari = $tanggalAkhir->diffInDays($tanggalAwal);
        }

        $user = PermohonanModels::create([
            'user_id' => Auth::user()->id,
            'start_date' => $request->input('start_date'),
            'end_date' => @$request->input('end_date'),
            'jumlah_cuti' => $selisihHari,
            'type' => $request->input('type_izin'),
            'description' => $request->input('alasan'),
        ]);


        // Lakukan registrasi atau tindakan lainnya jika validasi berhasil

        $request->session()->flash('success', 'Data Permohonan berhasil ditambahkan.');

        return redirect('/');
    }

    public function login()
    {

        return view('karyawan.login.index');
    }
}

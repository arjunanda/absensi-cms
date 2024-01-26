<?php

namespace App\Http\Controllers;

use App\Models\AbsensiModels;
use App\Models\JabatanModels;
use App\Models\User;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    //
    public function dashboard() {
        return view('dashboard.index');
    }

    public function presensi()
    {


        return view('owner.presensi.index');
    }

    public function detailPresensi($id)
    {
        $absensi = AbsensiModels::with('users')->find($id);

        $data = [
            'data' => $absensi
        ];

        return view('owner.presensi.detail', $data);
    }

    public function getAdmin(Request $request)
    {
        $perPage = $request->input('length', 10);
        $page = $request->input('start', 0) / $perPage + 1;

        // user

        $users = User::with('jabatans')->where('role_id', 1)->paginate($perPage, ['*'], 'page', $page);

        $data = $users->map(function ($user, $key) {
            return [
                'no' => $key + 1,
                'id' => $user->id,
                'name' => $user->name,
                'nip' => $user->nip,
            ];
        });

        return response()->json(['data' => $data, 'recordsFiltered' => $users->total(), 'recordsTotal' => $users->total()]);
    }

    public function create()
    {

        $jabatan = JabatanModels::all();


        $data = [
            'jabatan' => $jabatan
        ];

        return view('owner.admin.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'nip' => 'required|integer|unique:users', // confirmed: harus ada kolom 'password_confirmation'
            'password' => 'required|string|min:8|confirmed', // confirmed: harus ada kolom 'password_confirmation'
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/admin/add')
                ->withErrors($validator)
                ->withInput();
        }

        $fileName = null;

        if ($request->file('image')) {

            try {
                $res = new UploadImageService;
                $fileName = $res->upload($request->file('image'));


            } catch (\Throwable $th) {
                $request->session()->flash('error', 'Terjadi kesalahan ketika mengupload gambar.');

                return redirect('/dashboard/admin');
            }
        }

        $user = User::create([
            'role_id' => 1,
            'name' => $request->input('fullName'),
            'image' => $fileName,
            'email' => $request->input('email'),
            'nip' => $request->input('nip'),
            'password' => Hash::make($request->input('password')),
            'status' => true
        ]);


        // Lakukan registrasi atau tindakan lainnya jika validasi berhasil

        $request->session()->flash('success', 'Data admin berhasil ditambahkan.');

        return redirect('/dashboard/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('id', $id)->first();


        $data = [
            'users' => $users
        ];

        return view('owner.admin.add', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('id', $id)->first();

        $data = [
            'user' => $users,
        ];

        return view('owner.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/admin/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        $fileName = null;

        if ($request->file('image')) {

            try {
                $res = new UploadImageService;
                $fileName = $res->upload($request->file('image'));


            } catch (\Throwable $th) {
                $request->session()->flash('error', 'Terjadi kesalahan ketika mengupload gambar.');

                return redirect('/dashboard/admin');
            }
        }

        $user = User::where('id', $id)->where('role_id', 1)->first();



        $user->update([
            'name' => $request->input('fullName'),
            'image' => @$fileName ?? $user->image,
            'email' => $request->input('email'),
        ]);

        if ($user->nip !== $request->input('nip') ) {
            // Validasi dan update password
            $nipValidator = Validator::make($request->all(), [
                'nip' => 'required|integer|unique:users',
            ]);

            if ($nipValidator->fails()) {
                return redirect('/dashboard/admin/edit/' . $id)
                    ->withErrors($nipValidator)
                    ->withInput();
            }

            $user->update([
                'nip' => $request->input('nip'),
            ]);
        }

        if ($request->filled('password')) {
            // Validasi dan update password
            $passwordValidator = Validator::make($request->all(), [
                'password' => 'required|string|min:8|confirmed',
            ]);

            if ($passwordValidator->fails()) {
                return redirect('/dashboard/admin/edit/' . $id)
                    ->withErrors($passwordValidator)
                    ->withInput();
            }

            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        // Lakukan registrasi atau tindakan lainnya jika validasi berhasil

        $request->session()->flash('success', 'Data admin berhasil diperbaharui.');

        return redirect('/dashboard/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::where('role_id', 1)->where('id', $id)->first();

        if (!$user) {
            return redirect()->route('admin')->with('error', 'Admin tidak ditemukan.');
        }

        $user->delete();

        return redirect()->route('admin')->with('success', 'Admin berhasil dihapus.');
    }


}

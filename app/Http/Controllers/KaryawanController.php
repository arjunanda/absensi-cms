<?php

namespace App\Http\Controllers;

use App\Models\JabatanModels;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('length', 10);
        $page = $request->input('start', 0) / $perPage + 1;

        // user

        $users = User::with('jabatans')->where('role_id', 2)->paginate($perPage, ['*'], 'page', $page);

        $data = $users->map(function ($user, $key) {
            return [
                'no' => $key + 1,
                'id' => $user->id,
                'name' => $user->name,
                'nip' => $user->nip,
                'jabatan_name' => optional($user->jabatans)->jabatan,
            ];
        });

        return response()->json(['data' => $data, 'recordsFiltered' => $users->total(), 'recordsTotal' => $users->total()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jabatan = JabatanModels::all();


        $data = [
            'jabatan' => $jabatan
        ];

        return view('admin.karyawan.add', $data);
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
            'jabatan' => 'required',
            'nip' => 'required|integer', // confirmed: harus ada kolom 'password_confirmation'
            'password' => 'required|string|min:8|confirmed', // confirmed: harus ada kolom 'password_confirmation'
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/karyawan/add')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::create([
            'role_id' => 2,
            'jabatan_id' => $request->input('jabatan'),
            'name' => $request->input('fullName'),
            'image' => '',
            'email' => $request->input('email'),
            'nip' => $request->input('nip'),
            'password' => Hash::make($request->input('password')),
            'status' => true
        ]);


        // Lakukan registrasi atau tindakan lainnya jika validasi berhasil

        $request->session()->flash('success', 'Data karyawan berhasil ditambahkan.');

        return redirect('/dashboard/karyawan');
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

        $jabatan = JabatanModels::all();


        $data = [
            'users' => $users,
            'jabatan' => $jabatan
        ];

        return view('admin.karyawan.add', compact('data'));
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

        $jabatan = JabatanModels::all();


        $data = [
            'user' => $users,
            'jabatan' => $jabatan
        ];

        return view('admin.karyawan.edit', $data);
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
            'jabatan' => 'required',
            'nip' => 'required|integer', // confirmed: harus ada kolom 'password_confirmation'
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/karyawan/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('id', $id)->where('role_id', 2)->first();

        $user->update([
            'jabatan_id' => $request->input('jabatan'),
            'name' => $request->input('fullName'),
            'image' => '',
            'email' => $request->input('email'),
            'nip' => $request->input('nip'),
        ]);

        if ($request->filled('password')) {
            // Validasi dan update password
            $passwordValidator = Validator::make($request->all(), [
                'password' => 'required|string|min:8|confirmed',
            ]);

            if ($passwordValidator->fails()) {
                return redirect('/dashboard/karyawan/edit/' . $id)
                    ->withErrors($passwordValidator)
                    ->withInput();
            }

            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        // Lakukan registrasi atau tindakan lainnya jika validasi berhasil

        $request->session()->flash('success', 'Data karyawan berhasil diperbaharui.');

        return redirect('/dashboard/karyawan');
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
    }
}

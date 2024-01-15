<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JabatanModels;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
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


        $jabatans = JabatanModels::withCount('users')->paginate($perPage, ['*'], 'jabatan', $page);

        $data = $jabatans->map(function ($item, $key) {
            return [
                'no' => $key + 1,
                'id' => $item->id,
                'jabatan' => $item->jabatan,
                'jumlah_karyawan' => $item->users_count,
            ];
        });

        return response()->json(['data' => $data, 'draw' => $perPage, 'recordsFiltered' => $jabatans->total(), 'recordsTotal' => $jabatans->total()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatan.add');
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
            'jabatan_name' => 'required|string|max:255',
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/jabatan/add')
                ->withErrors($validator)
                ->withInput();
        }
        $user = JabatanModels::create([
            'jabatan' => $request->input('jabatan_name')
        ]);


        // Lakukan registrasi atau tindakan lainnya jika validasi berhasil

        $request->session()->flash('success', 'Data jabatan berhasil ditambahkan.');

        return redirect('/dashboard/jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jabatan = JabatanModels::find($id);

        return view('admin.jabatan.edit', compact('jabatan'));
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
            'jabatan_name' => 'required|string|max:255',
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/jabatan/add')
                ->withErrors($validator)
                ->withInput();
        }

        $jabatan = JabatanModels::find($id);

        $jabatan->update([
            'jabatan' => $request->input('jabatan_name')
        ]);


        // Lakukan registrasi atau tindakan lainnya jika validasi berhasil

        $request->session()->flash('success', 'Data jabatan berhasil diperbaharui.');

        return redirect('/dashboard/jabatan');
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

        $user = JabatanModels::find($id);

        if (!$user) {
            return redirect()->route('jabatan')->with('error', 'Jabatan tidak ditemukan.');
        }

        $user->delete();

        return redirect()->route('jabatan')->with('success', 'Jabatan berhasil dihapus.');
    }
}

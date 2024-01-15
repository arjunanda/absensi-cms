<?php

namespace App\Http\Controllers;

use App\Models\LemburModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('length', 10);
        $page = $request->input('start', 0) / $perPage + 1;

        $permohonan = LemburModels::with('users')->paginate($perPage, ['*'], 'page', $page);

        $data = $permohonan->map(function ($item, $key) {

            $carbonAwalDate = Carbon::parse($item->awal_cuti);
            $carbonAkhirDate = Carbon::parse($item->akhir_cuti);


            return [
                'no' => $key + 1,
                'id' => $item->id,
                'awal_lembur' => $carbonAwalDate->format('d F Y'),
                'akhir_lembur' => @$item->akhir_lembur ? $carbonAkhirDate->format('d F Y') : '- ',
                'jumlah_lembur' => @$item->jumlah_lembur ? $carbonAkhirDate->format('d F Y') : '- ',
                'description' => $item->description,
                'status' => $item->status,
                'name' => optional($item->users)->name,
            ];
        });

        return response()->json(['data' => $data, 'recordsFiltered' => $permohonan->total(), 'recordsTotal' => $permohonan->total()]);
    }

    public function detail($id)
    {
        $data = LemburModels::with('users')->find($id);


        return view('admin.permohonan.detail', compact('data'));
    }

    public function changeStatus(Request $request, $id)
    {

        $role = Auth::user()->hasRoleName('admin');

        if ($role) {

            $permohonan = LemburModels::find($id);


            if ($permohonan) {

                $permohonan->update([
                    'status' => $request->input('status')
                ]);

                return redirect()->route('list_lembur')->with('success', 'Status berhasil diubah.');
            }

            return redirect()->route('jabatan')->with('error', 'Permohonan tidak ditemukan.');
        }
    }

}




<?php

namespace App\Http\Controllers;

use App\Models\PermohonanModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('length', 10);
        $page = $request->input('start', 0) / $perPage + 1;

        $permohonan = PermohonanModels::with('users')->paginate($perPage, ['*'], 'page', $page);

        $data = $permohonan->map(function ($item, $key) {

            $carbonAwalDate = Carbon::parse($item->awal_cuti);
            $carbonAkhirDate = Carbon::parse($item->akhir_cuti);

            return [
                'no' => $key + 1,
                'id' => $item->id,
                'type' => $item->type,
                'awal_cuti' => $carbonAwalDate->format('d F Y'),
                'akhir_cuti' => $carbonAkhirDate->format('d F Y'),
                'description' => $item->description,
                'status' => $item->status,
                'name' => optional($item->users)->name,
            ];
        });

        return response()->json(['data' => $data, 'recordsFiltered' => $permohonan->total(), 'recordsTotal' => $permohonan->total()]);
    }

    public function detail($id) {
        $data = PermohonanModels::with('users')->find($id);


        return view('admin.permohonan.detail', compact('data'));

    }

    public function changeStatus(Request $request, $id) {

        $role = Auth::user()->hashRoleName('admin');

        if ($role) {

            $permohonan = PermohonanModels::find($id);
            $permohonan::update([
                'status' => $request->input('status')
            ]);

            return response()->json([
                "valid" => true,
                "message" => "Success change status",
            ]);
        }


    }
}


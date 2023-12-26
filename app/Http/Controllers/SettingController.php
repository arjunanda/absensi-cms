<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingModels;
use Illuminate\Support\Facades\Validator;
use DateTime;

class SettingController extends Controller
{
    //
    public function index()
    {
        $setting = SettingModels::first();

        $checkInDateTime = new DateTime($setting->check_in);
        $checkOutDateTime = new DateTime($setting->check_out);


        $data = [
            'check_in' => $checkInDateTime->format('H:i'),
            'check_out' => $checkOutDateTime->format('H:i')
        ];


        return view('admin.settings.index', $data);
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'check_in' => 'required',
            'check_out' => 'required'
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/setting/')
                ->withErrors($validator)
                ->withInput();
        }

        $setting = SettingModels::find(1);

        $setting->update([
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
        ]);

        // $checkInDateTime = new DateTime($setting->check_in);
        // $checkOutDateTime = new DateTime($setting->check_out);


        // $data = [
        //     'check_in' => $checkInDateTime->format('H:i'),
        //     'check_out' => $checkOutDateTime->format('H:i')
        // ];


        $request->session()->flash('success', 'Data setting berhasil diperbaharui.');

        return redirect('/dashboard/settings');
    }
}

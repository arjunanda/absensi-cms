<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingModels;
use App\Models\User;
use App\Services\UploadImageService;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function editProfile()
    {

        $user = Auth::user();

        // dd($this->user);
        $users = User::where('id', $user->id)->first();


        $data = [
            'user' => $users,
        ];

        return view('admin.settings.update_profile', $data);
    }

    public function updateProfile(Request $request) {

        $id = Auth::user()->id;

        // dd($request->file('image'));
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'nip' => 'required|integer', // confirmed: harus ada kolom 'password_confirmation'
        ]);

        // dd($validator->fails());


        if ($validator->fails()) {

            return redirect('/dashboard/edit-profile')
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

                return redirect('/dashboard/edit-profile');
            }
        }




        $user = User::where('id', $id)->where('role_id', 1)->first();

        $user->update([
            'name' => $request->input('fullName'),
            'image' => @$request->file('image') ? $fileName : $user->image,
            'email' => $request->input('email'),
            'nip' => $request->input('nip'),
        ]);

        if ($request->filled('password')) {
            // Validasi dan update password
            $passwordValidator = Validator::make($request->all(), [
                'password' => 'required|string|min:8|confirmed',
            ]);

            if ($passwordValidator->fails()) {
                return redirect('/dashboard/edit-profile/' . $id)
                    ->withErrors($passwordValidator)
                    ->withInput();
            }

            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        // Lakukan registrasi atau tindakan lainnya jika validasi berhasil

        $request->session()->flash('success', 'Profile berhasil diperbaharui.');

        return redirect('/dashboard/edit-profile');
    }

}

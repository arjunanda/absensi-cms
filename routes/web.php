<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SettingController;

// Route::get('/', function () {
//     return redirect()->route('dashboard');
// })->name('/');

Route::group(['middleware' => ['checkRole:karyawan']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/absen', [HomeController::class, 'absen'])->name('absen');
    Route::get('/rekam_kehadiran', [HomeController::class, 'viewAbsen'])->name('rekam_kehadiran');
    Route::get('/history', [HomeController::class, 'history'])->name('history');

});

Route::get('/login-karyawan', [HomeController::class, 'login'])->name('login-karyawan');
Route::post('/login-karyawan', [AuthController::class, 'login_karyawan'])->name('post_karyawan');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');

Route::prefix('dashboard')->group(function () {
    Route::view('index', 'dashboard.index')->name('index');
    Route::view('dashboard-02', 'dashboard.dashboard-02')->name('dashboard-02');
});

Route::prefix('page-layouts')->group(function () {
    Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');
    Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');
    Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');
    Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');
    Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');
    Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');
    Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');
});

Route::view('sample-page', 'pages.sample-page')->name('sample-page');
Route::view('landing-page', 'pages.landing-page')->name('landing-page');

Route::prefix('others')->group(function () {
    Route::view('400', 'errors.400')->name('error-400');
    Route::view('401', 'errors.401')->name('error-401');
    Route::view('403', 'errors.403')->name('error-403');
    Route::view('404', 'errors.404')->name('error-404');
    Route::view('500', 'errors.500')->name('error-500');
    Route::view('503', 'errors.503')->name('error-503');
});

Route::prefix('layouts')->group(function () {
    Route::view('compact-sidebar', 'admin_unique_layouts.compact-sidebar'); //default //Dubai
    Route::view('box-layout', 'admin_unique_layouts.box-layout');    //default //New York //
    Route::view('dark-sidebar', 'admin_unique_layouts.dark-sidebar');

    Route::view('default-body', 'admin_unique_layouts.default-body');
    Route::view('compact-wrap', 'admin_unique_layouts.compact-wrap');
    Route::view('enterprice-type', 'admin_unique_layouts.enterprice-type');

    Route::view('compact-small', 'admin_unique_layouts.compact-small');
    Route::view('advance-type', 'admin_unique_layouts.advance-type');
    Route::view('material-layout', 'admin_unique_layouts.material-layout');

    Route::view('color-sidebar', 'admin_unique_layouts.color-sidebar');
    Route::view('material-icon', 'admin_unique_layouts.material-icon');
    Route::view('modern-layout', 'admin_unique_layouts.modern-layout');
});

Route::prefix('authentication')->group(function () {
    Route::view('login', 'authentication.login')->name('login');
    Route::view('login-one', 'authentication.login-one')->name('login-one');
    Route::view('login-two', 'authentication.login-two')->name('login-two');
    Route::view('login-bs-validation', 'authentication.login-bs-validation')->name('login-bs-validation');
    Route::view('login-bs-tt-validation', 'authentication.login-bs-tt-validation')->name('login-bs-tt-validation');
    Route::view('login-sa-validation', 'authentication.login-sa-validation')->name('login-sa-validation');
    Route::view('sign-up', 'authentication.sign-up')->name('sign-up');
    Route::view('sign-up-one', 'authentication.sign-up-one')->name('sign-up-one');
    Route::view('sign-up-two', 'authentication.sign-up-two')->name('sign-up-two');
    Route::view('sign-up-wizard', 'authentication.sign-up-wizard')->name('sign-up-wizard');
    Route::view('unlock', 'authentication.unlock')->name('unlock');
    Route::view('forget-password', 'authentication.forget-password')->name('forget-password');
    Route::view('reset-password', 'authentication.reset-password')->name('reset-password');
    Route::view('maintenance', 'authentication.maintenance')->name('maintenance');
});

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');


// Authentication
Route::prefix('auth')->group(function () {
    Route::view('/', 'authentication.login-one')->name('auth');
    Route::post('/', [AuthController::class, 'login']);
});


Route::group(['middleware' => ['checkRole:admin'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

    // Karyawan

    Route::view('/karyawan', 'admin.karyawan.index')->name('karyawan');
    Route::get('/get-karyawan', [KaryawanController::class, 'index']);
    Route::get('/karyawan/add', [KaryawanController::class, 'create'])->name('add-karyawan');
    Route::post('/karyawan/add', [KaryawanController::class, 'store'])->name('store-karyawan');
    Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('edit-karyawan');
    Route::post('/karyawan/edit/{id}', [KaryawanController::class, 'update'])->name('update-karyawan');

    // Jabatan
    Route::view('/jabatan', 'admin.jabatan.index')->name('jabatan');
    Route::get('/get-jabatan', [JabatanController::class, 'index']);
    Route::get('/jabatan/add', [JabatanController::class, 'create'])->name('add-jabatan');
    Route::post('/jabatan/add', [JabatanController::class, 'store'])->name('store-jabatan');
    Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit'])->name('edit-jabatan');
    Route::post('/jabatan/edit/{id}', [JabatanController::class, 'update'])->name('update-jabatan');

    // Presensi
    Route::view('/presensi', 'admin.jabatan.index')->name('presensi');
    Route::get('/get-presensi', [PresensiController::class, 'index']);
    Route::get('/presensi/add', [PresensiController::class, 'create'])->name('add-presensi');
    Route::post('/presensi/add', [PresensiController::class, 'store'])->name('store-presensi');
    Route::get('/presensi/edit/{id}', [PresensiController::class, 'edit'])->name('edit-presensi');
    Route::post('/presensi/edit/{id}', [PresensiController::class, 'update'])->name('update-presensi');

    // Setting
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/update-setting', [SettingController::class, 'update'])->name('update-setting');

    // Permohonan
    Route::view('/permohonan', 'admin.permohonan.index')->name('permohonan');
    Route::get('/get-permohonan', [PermohonanController::class, 'index'])->name('get-permohonan');
    Route::get('/permohonan/detail/{id}', [PermohonanController::class, 'detail'])->name('detail-permohonan');
});

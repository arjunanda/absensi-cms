@extends('layouts.authentication.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
@endsection

@section('style')
@endsection

@section('content')
    <style>
        .show-container {
            position: absolute;
            right: 0;
            top: -60%;
            /* Sesuaikan margin sesuai kebutuhan */
        }
    </style>
    <div class="container-fluid p-0 bg-light-primary">

        <div class="row m-auto bg-white position-relative" style='max-width: 500px;height: 100vh;'>

            {{-- <div class="position-fixed  border-top border-1" style="max-width: 500px;"> --}}
            @yield('karyawan_content')
            {{-- </div> --}}

        </div>
    </div>
@endsection

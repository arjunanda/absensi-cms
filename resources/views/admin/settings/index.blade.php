@extends('layouts.simple.master')
@section('title', 'Validation Forms')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/timepicker.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Atur Jam Kerja</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Settings</li>
@endsection

@section('content')
    <style>
        .show-container {
            position: absolute;
            right: 0;
            top: -5px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class=" col-md-12 mb-3 ">

                                @if (session('success'))
                                    <div id="alert-message"
                                        class="alert alert-success dark alert-dismissible fade show"
                                        role="alert">
                                        <center>

                                            <strong class="text-center">{{ session('success') }}</strong>



                                        </center>
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <form novalidate="" method="POST" action="{{ route('update-setting') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Jam Kerja</label>
                                    <div class="input-group clockpicker pull-center" data-placement="bottom"
                                        data-align="left" data-autoclose="true">
                                        <input class="form-control" type="text" name="check_in"
                                            value="{{ $check_in }}"><span class="input-group-addon"><span
                                                class="glyphicon glyphicon-time"></span></span>
                                    </div>

                                    @error('check_in')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Jam Pulang Kerja</label>
                                    <div class="input-group clockpicker pull-center" data-placement="bottom"
                                        data-align="left" data-autoclose="true">
                                        <input class="form-control" type="text" name="check_out"
                                            value="{{ $check_out }}"><span class="input-group-addon"><span
                                                class="glyphicon glyphicon-time"></span></span>
                                    </div>

                                    @error('check_out')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker/jquery-clockpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker/clockpicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.btn-close').click();
            }, 3000);
        })
    </script>
@endsection

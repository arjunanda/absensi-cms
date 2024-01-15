@extends('layouts.simple.master')
@section('title', 'Validation Forms')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Buat Laporan</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Buat Laporan</li>
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
                        <form novalidate="" method="POST" action="{{ route('store-presensi') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row-cols-6">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" id="user-select">
                                        Karyawan
                                    </label>

                                    <select class="form-control @error('user_id') is-invalid @enderror" id="user-select"
                                        name="user_id">

                                        <option value="0">--Select--</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Tanggal Awal</label>
                                    <input class="form-control @error('start_date') is-invalid @enderror" id="validationCustom02"
                                        type="date" placeholder="Tanggal Awal" name="start_date" value="{{ old('start_date') }}"
                                        required="">


                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Tanggal Akhir</label>
                                    <input class="form-control @error('end_date') is-invalid @enderror" id="validationCustom02"
                                        type="date" placeholder="Tanggal Akhir" name="end_date" value="{{ old('end_date') }}"
                                        required="">


                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>


                            </div>
                            <a href="{{ route('presensi') }}"><button class="btn btn-secondary"
                                    type="button">Cancel</button></a>

                            <button class="btn btn-primary" type="submit">Download PDF</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('imagePreview');
            var container = document.getElementById('preview');

            container.classList.toggle('d-none')

            var files = input.files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (file.type.match('image.*')) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result
                    };

                    reader.readAsDataURL(file);
                } else {
                    var errorMessage = document.createElement('p');
                    errorMessage.style.color = 'red';
                    errorMessage.textContent = 'File tidak valid, pilih file gambar.';
                    preview.appendChild(errorMessage);
                }
            }

        }
    </script>
@endsection

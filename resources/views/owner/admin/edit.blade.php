@extends('layouts.simple.master')
@section('title', 'Validation Forms')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Validation Forms</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Form Controls</li>
    <li class="breadcrumb-item active">Validation Forms</li>
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
                        <form novalidate="" method="POST" action="{{ route('update-admin', ['id' => $user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Full Name</label>
                                    <input class="form-control @error('fullName') is-invalid @enderror"
                                        id="validationCustom01" type="text" name="fullName" placeholder="Full Name"
                                        required="" value="{{ old('fullName') ?? $user->name }}" name="fullName">


                                    @error('fullName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">NIP</label>
                                    <input class="form-control @error('nip') is-invalid @enderror" id="validationCustom02"
                                        type="number" placeholder="NIP" name="nip"
                                        value="{{ old('nip') ?? $user->nip }}" required="">



                                    @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    <input class="form-control" id="validationCustom02" type="file" name="image"
                                        placeholder="Image" required="" accept="image/*" onchange="previewImage(event)">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <div class="pt-3">
                                        <img src="{{ @$user->image ? '/uploads/' . @$user->image : '/assets/img/profile.png' }}"
                                            id="imagePreview" alt="" width="100" height="100"
                                            style="object-fit: cover; box-shadow: 0px 0px 3px 1px #ddd; border-radius: 5px;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="validationCustom01"
                                        type="email" placeholder="Email" name="email" required=""
                                        value="{{ old('email') ?? $user->email }}">


                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>



                                <div class="col-md-6 mb-3 align-items-center">
                                    <label for="validationCustom01">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror"
                                        id="validationCustom01" type="password" name="password"
                                        value="{{ old('password') }}" placeholder="Password" required="">

                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="show-container">
                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Password Confirmation</label>
                                    <input class="form-control @error('password') is-invalid @enderror"
                                        id="validationCustom02" type="password" placeholder="Password Confirmation"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}"
                                        required="">



                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror


                                </div>


                            </div>
                            <a href="{{ route('admin') }}"><button class="btn btn-secondary"
                                    type="button">Cancel</button></a>


                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('imagePreview');

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
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
@endsection

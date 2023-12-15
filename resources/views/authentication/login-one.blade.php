@extends('layouts.authentication.master')
@section('title', 'Login-one')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <style>
        .show-container {
            position: absolute;
            right: 0;
            bottom: 30%;
            /* Sesuaikan margin sesuai kebutuhan */
        }

        .input-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/2.jpg') }}"
                    alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo text-start" href="{{ route('index') }}"><img class="img-fluid for-light"
                                    src="{{ asset('assets/images/logo/login.png') }}" alt="looginpage"><img
                                    class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                    alt="looginpage"></a></div>
                        <div class="login-main">

                            <h4>Sign in to account</h4>
                            <p>Enter your email & password to login</p>
                            <form class="theme-form" novalidate="" method="POST" action="{{ route('auth') }}">
                                @csrf

                                <div class="form-group">
                                    <label class="col-form-label">NIP</label>
                                    <input class="form-control" name="nip" type="number" required=""
                                        placeholder="1234567">
                                        @error('login')

                                        <b class="text-dark">{{$message}}</b>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>

                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                    <div class="invalid-feedback">Please enter password.</div>
                                    <div class="show-container">

                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>

                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                </div>
                                <script>
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

@extends('karyawan.layouts.index')
@section('title', 'Login')


@section('karyawan_content')
    <div class="container-fluid">

        {{-- <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div> --}}
        <div class="flex flex-column px-5 justify-content-center align-items-center"
            style="height: 100vh; display: flex; align-items: center;">

            <div class="login-main w-100">
                <div class="w-full">
                    <div class="d-flex justify-content-center">

                        <img src="/assets/img/spln-icon.jpg" width="200" height="150" style="object-fit: cover;" />
                    </div>
                </div>
                <form class="theme-form" novalidate="" action="{{ route('post_karyawan') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label text-black-50">NIP</label>
                        <input class="form-control" type="number" name="nip" required="" placeholder="11223344">
                        @error('login')
                            <b class="text-dark">{{ $message }}</b>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label text-black-50">Password</label>
                        <div class="position-relative flex align-items-center justify-content-center">

                            <input class="form-control" type="password" name="password" required=""
                                placeholder="*********">
                            <div class="invalid-feedback">Please enter password.</div>
                            <div class="show-container">

                                <div class="show-hide"><span class="show text-warning"></span></div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group mb-0">
                        <button class="btn btn-warning btn-block form-control" type="submit">Sign in</button>
                    </div>
                    {{-- <h6 class="text-muted mt-4 or">Or Sign in with</h6> --}}
                    <div class="social mt-4">
                        {{-- <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

@extends('layouts.authentication.master')
@section('title', 'Login')

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

</style>
<div class="container-fluid p-0">
         <div class="row m-0">
                  <div class="col-12 p-0">
                           <div class="login-card">
                                    <div class="w-100">
                                             {{-- <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div> --}}
                                    <div class="login-main">
                                             <form class="theme-form">
                                                      <div class="form-group">
                                                               <label class="col-form-label">NIP</label>
                                                               <input class="form-control" type="number" required="" placeholder="11223344">
                                                      </div>
                                                      <div class="form-group">
                                                               <label class="col-form-label">Password</label>
                                                               <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                                               <div class="show-container">

                                                                        <div class="show-hide"><span class="show"></span></div>
                                                               </div>

                                                      </div>
                                                      <div class="form-group mb-0">
                                                               <button class="btn btn-primary btn-block form-control" type="submit">Sign in</button>
                                                      </div>
                                                      {{-- <h6 class="text-muted mt-4 or">Or Sign in with</h6> --}}
                                                      <div class="social mt-4">
                                                               {{-- <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div> --}}
                                                      </div>
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

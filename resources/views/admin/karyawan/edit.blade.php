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
                                             <form novalidate="" method="POST" action="{{ route('update-karyawan', ['id' => $user->id]) }}">
                                                      @csrf
                                                      <div class="row">
                                                               <div class="col-md-6 mb-3">
                                                                        <label for="validationCustom01">Full Name</label>
                                                                        <input class="form-control @error('fullName') is-invalid @enderror" id="validationCustom01" type="text" name="fullName" placeholder="Full Name" required="" value="{{ old('fullName') ?? $user->name }}" name="fullName">


                                                                        @error('fullName')


                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                               </div>
                                                               <div class="col-md-6 mb-3">
                                                                        <label for="validationCustom02">NIP</label>
                                                                        <input class="form-control @error('nip') is-invalid @enderror" id="validationCustom02" type="number" placeholder="NIP" name="nip" value="{{ old('nip') ?? $user->nip }}" required="">



                                                                        @error('nip')


                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                               </div>
                                                               <div class="col-md-6 mb-3">
                                                                        <label class="form-label" id="jabatan_select">
                                                                                 Jabatan
                                                                        </label>

                                                                        <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan_select" name="jabatan">

                                                                                 <option value="0">--Select--</option>
                                                                                 @foreach($jabatan as $item)

                                                                                 <option value="{{ $item->id }}" {{ (old('jabatan') ?? $user->jabatan_id) == $item->id ? 'selected' : '' }}>{{ $item->jabatan }}</option>

                                                                                 @endforeach
                                                                        </select>
                                                                        @error('jabatan')


                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                               </div>
                                                               <div class="col-md-6 mb-3">
                                                                        <label for="validationCustom01">Email</label>
                                                                        <input class="form-control @error('email') is-invalid @enderror" id="validationCustom01" type="email" placeholder="Email" name="email" required="" value="{{ old('email') ?? $user->email }}">


                                                                        @error('email')

                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                               </div>

                                                               {{-- <div class="col-md-12 mb-3">
                                                                        <label for="validationCustom02">Image</label>
                                                                        <input class="form-control" id="validationCustom02" type="file" placeholder="Image" required="" accept="image/*">
                                                                        <div class="valid-feedback">Looks good!</div>
                                                               </div> --}}

                                                               <div class="col-md-6 mb-3 align-items-center">
                                                                        <label for="validationCustom01">Password</label>
                                                                        <input class="form-control @error('password') is-invalid @enderror" id="validationCustom01" type="password" name="password" value="{{ old('password') }}" placeholder="Password" required="">

                                                                        @error('password')

                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                        <div class="show-container">
                                                                                 <div class="show-hide"><span class="show"></span></div>
                                                                        </div>

                                                               </div>
                                                               <div class="col-md-6 mb-3">
                                                                        <label for="validationCustom02">Password Confirmation</label>
                                                                        <input class="form-control @error('password') is-invalid @enderror" id="validationCustom02" type="password" placeholder="Password Confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required="">



                                                                        @error('password')

                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror


                                                               </div>

                                                      </div>
                                                      <a href="{{ route('karyawan') }}"><button class="btn btn-secondary" type="button">Cancel</button></a>


                                                      <button class="btn btn-primary" type="submit">Update</button>
                                             </form>
                                    </div>
                           </div>
                  </div>
         </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
@endsection

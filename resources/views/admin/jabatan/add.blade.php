@extends('layouts.simple.master')
@section('title', 'Validation Forms')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Tambah Jabatan</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item">Jabatan</li>

<li class="breadcrumb-item active">add</li>
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
                                             <form novalidate="" method="POST" action="{{ route('store-jabatan') }}">
                                                      @csrf
                                                      <div class="row">
                                                               <div class="col-md-6 mb-3">
                                                                        <label for="validationCustom01">Jabatan Name</label>
                                                                        <input class="form-control @error('jabatan_name') is-invalid @enderror" id="validationCustom01" type="text" name="jabatan_name" placeholder="Nama Jabatan" required="" value="{{ old('jabatan_name') }}" name="jabatan_name">





                                                                        @error('jabatan_name')



                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                               </div>


                                                      </div>
                                                      <a href="{{ route('jabatan') }}"><button class="btn btn-secondary" type="button">Cancel</button></a>


                                                      <button class="btn btn-primary" type="submit">Tambah</button>
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

@extends('layouts.simple.master')
@section('title', 'Product Page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/rating.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Permohonan Ijin</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Permohonan</li>
@endsection

@section('content')
<div class="container-fluid">
   <div>
      <div class="row product-page-main p-0">
         <div class="col-xl-5 xl-100 box-col-6">
            <div class="card">
               <div class="card-body">
                  <div class="product-page-details">
                     <h3>{{ $data->users->name }}</h3>
                  </div>
                  <hr>
                  <p>{{ $data->description }}</p>
                  <hr>
                  <div>
                     <table class="product-page-width">
                        <tbody>
                           <tr>
                              <td> <b>Type</b></td>
                              <td class="px-3"> <b>:</b></td>
                              <td>{{ $data->type }}</td>
                           </tr>
                           <tr>
                              <td> <b>Awal Ijin</b></td>
                              <td class="px-3"> <b>:</b></td>
                              <td>{{ $data->awal_cuti }}</td>
                           </tr>
                           <tr>
                              <td> <b>Akhir Ijin</b></td>
                              <td class="px-3"> <b>:</b></td>
                              <td>{{ $data->akhir_cuti }}</td>
                           </tr>
                           <tr>
                              <td> <b>Jumlah Cuti</b></td>
                              <td class="px-3"> <b>:</b></td>
                              <td>{{ $data->jumlah_cuti }}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <hr>
                  <div class="m-t-15">
                      <a href={{ route('permohonan') }}><button class="btn btn-dark m-r-10" type="button" title="">Back</button></a>
                      <button class="btn btn-danger m-r-10" type="button" title="">Cancel</button>
                     <button class="btn btn-success m-r-10" type="button" title="">Approve</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/rating/jquery.barrating.js')}}"></script>
<script src="{{asset('assets/js/rating/rating-script.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/ecommerce.js')}}"></script>
@endsection

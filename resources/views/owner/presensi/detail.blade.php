@extends('layouts.simple.master')
@section('title', 'Product Page')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Detail Absen</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Detail Absen</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div>
            <div class="row product-page-main p-0">
                <div class="col-md-12 md-100 box-col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-page-details">
                                <h3>{{ $data->users->name }}</h3>
                            </div>
                            <hr>
                            <div>
                                <div style="margin-top: 10px;">

                                    <div>

                                        <table class="product-page-width">
                                            <tbody>
                                                <tr>
                                                    <td style="padding-bottom: 10px;"> <b>Tanggal</b></td>
                                                    <td style="padding-bottom: 10px;" class="px-3"> <b>:</b></td>
                                                    <td style="padding-bottom: 10px;">{{ \Carbon\Carbon::parse($data->tanggal_checkin)->format('d M Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 20px 0px;"> <b>Check In</b></td>
                                                    <td style="padding: 20px 0px;" class="px-3"> <b>:</b></td>
                                                    <td style="padding: 20px 0px;">{{ @$data->check_in ? \Carbon\Carbon::parse(@$data->check_in)->format('H:i') : '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td> <b>Foto Check In</b></td>
                                                    <td class="px-3"> <b>:</b></td>
                                                    <td>@if (@$data->image_checkin)<img src="/uploads/{{ @$data->image_checkin }}" alt="" width="80" height="80" class="shadow" style="object-fit: cover; border-radius: 10px;"> @else - @endif</td>
                                                </tr>

                                                <tr>
                                                    <td style="padding: 20px 0px;"> <b>Check Out</b></td>
                                                    <td style="padding: 20px 0px;" class="px-3"> <b>:</b></td>
                                                    <td style="padding: 20px 0px;">{{ \Carbon\Carbon::parse($data->check_out)->format('H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <td> <b>Foto Check Out</b></td>
                                                    <td class="px-3"> <b>:</b></td>
                                                    <td>@if (@$data->image_checkout)<img src="/uploads/{{ @$data->image_checkout }}" alt="" width="80" height="80" class="shadow" style="object-fit: cover; border-radius: 10px;"> @else - @endif</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="m-t-15">

                                <a href={{ route('presensi.owner') }}><button class="btn btn-dark m-r-10" type="button"
                                        title="">Back</button></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>

    <script>
        // $(document).ready(function() {
        function ChangeStatus(status) {
            $.ajax({
                type: "POST",
                url: "{{ route('change_permohonan_status', ['id' => $data->id]) }}",
                datatype: 'json',
                data: {
                    'status': status,
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response)
                }
            })
        }
        // })
    </script>
@endsection

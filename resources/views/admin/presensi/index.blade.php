@extends('layouts.simple.master')
@section('title', 'Bootstrap Basic Tables')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Presensi Lists</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">presensi</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 project-list">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0 me-0"></div>
                            <a class="btn btn-primary" href="{{ route('create-presensi') }}"> <i data-feather="plus-square">
                                </i>Buat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            @if (session('success'))
                                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                    <center>

                                        <strong class="text-center">{{ session('success') }}</strong>



                                    </center>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif


                        </div>

                        <div class="table-responsive">
                            <table id="presensi-table" class="display datatables">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Check In</th>
                                        <th scope="col">Check in</th>
                                        <th scope="col">Check out</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                                                        @foreach ($users as $key => $user)


                                                                        <tr>
                                                                                 <th scope="row">{{ $key+1 }}</th>
                                                               <td>{{ $user->name }}</td>
                                                               <td>{{ $user->nip }}</td>
                                                               <td>{{ $user->jabatans->jabatan }}</td>
                                                               <td>
                                                                        <button type="button" class="btn btn-danger">Delete</button>
                                                                        <button type="button" class="btn btn-success">Edit</button>

                                                               </td>
                                                               </tr>
                                                               @endforeach

                                                               </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#presensi-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('/dashboard/get-presensi') }}',
                    type: 'GET',
                },
                columns: [{
                    data: 'no',
                    name: 'no'
                }, {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'tanggal_checkin',
                    name: 'tanggal_checkin'
                }, {
                    data: 'check_in',
                    name: 'check_in'

                }, {
                    data: 'check_out',
                    name: 'check_out'
                }, {
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function(data, type, row) {
                        return '<a href="/dashboard/presensi/detail/' + row.id +
                            '"><button class="btn btn-success">Detail</button></a> ';

                    },
                    width: '150px'

                }, ],
            });
            setTimeout(() => {
                $('.btn-close').click();
            }, 3000);
        });
    </script>

@endsection

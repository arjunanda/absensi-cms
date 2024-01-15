@extends('layouts.simple.master')
@section('title', 'Bootstrap Basic Tables')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Permohonan Lists</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Permohonan lists</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">


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
                            <table id="permohonan-table" class="display datatables">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Tanggal Awal Ijin</th>
                                        <th scope="col">Tanggal Akhir Ijin</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
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
            $('#permohonan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('/dashboard/get-permohonan') }}',
                    type: 'GET',
                },
                columns: [{
                    data: 'no',
                    name: 'no'
                }, {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'type',
                    name: 'type'
                }, {
                    data: 'awal_cuti',
                    name: 'awal_cuti'

                }, {
                    data: 'akhir_cuti',
                    name: 'akhir_cuti'

                }, {
                    data: null,
                    render: function(data, type, row) {

                        if (data.status == 'inapprove') {

                            return '<span class="font-danger">Canceled</span>'
                        }
                        if (data.status == 'approve') {

                            return '<span class="font-success">Approved</span>'
                        }
                        if (data.status == 'pending') {

                            return '<span class="font-info">Pending</span>'
                        }
                    }

                }, {
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function(data, type, row) {
                        return '<a href="/dashboard/permohonan/detail/' + row.id +
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

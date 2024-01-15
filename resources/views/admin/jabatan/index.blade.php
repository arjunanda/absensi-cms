@extends('layouts.simple.master')
@section('title', 'Bootstrap Basic Tables')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Jabatan Lists</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Jabatan</li>
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
                            <a class="btn btn-primary" href="{{ route('add-jabatan') }}"> <i data-feather="plus-square">
                                </i>Tambah Jabatan</a>
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
                            <table id="jabatan-table" class="display datatables">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Jumlah Karyawan</th>
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
            $('#jabatan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('/dashboard/get-jabatan') }}',
                    data: function(d) {
                        d.draw = d.start / d.length + 1;

                    },
                    type: 'GET',
                },
                columns: [{
                    data: 'no',
                    name: 'no'
                }, {
                    data: 'jabatan',
                    name: 'jabatan'
                }, {
                    data: 'jumlah_karyawan',
                    name: 'jumlah_karyawan'


                }, {
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: function(data, type, row) {
                        return '<div  class="d-flex flex-wrap justify-content-start"><a href="/dashboard/jabatan/edit/' + row.id +
                            '"><button class="btn btn-success " style="margin-top: 2px; margin-right: 5px;">Edit</button></a> ' +

                            '<form action="/dashboard/jabatan/delete/' + row.id + '" method="POST" class="delete-form" style="margin-top: 2px;">' +
                    '@csrf' +
                    '@method("DELETE")' +
                    '<button type="button" class="btn btn-danger delete-btn">Delete</button>' +
                    '</form> </div>';

                    },
                    width: '150px'

                }, ],
            });

            $('#jabatan-table').on('click', '.delete-btn', function() {
                var form = $(this).closest('form');

                // Konfirmasi penghapusan (gunakan sweetalert atau konfirmasi sesuai kebutuhan)
                if (confirm('Apakah kamu yakin ingin menghapus jabatan ini?')) {
                    // Kirim formulir penghapusan
                    form.submit();
                }
            });
            setTimeout(() => {
                $('.btn-close').click();
            }, 3000);
        });
    </script>

@endsection

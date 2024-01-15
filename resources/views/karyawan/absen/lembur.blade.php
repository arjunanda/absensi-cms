@extends('karyawan.layouts.index')


@section('karyawan_content')
    <div class="position-fixed  border-top border-1 p-0" style="max-width: 500px;">
        <div>
            <nav class="navbar navbar-dark bg-transparent px-3" style="box-shadow: 0px 1px 3px 0px #ccc;">
                <div class="w-100 d-flex flex-row justify-content-between align-items-center">
                    <button class="btn btn-link text-dark px-0 py-0" onclick="goBack()">
                        <i class="fa fa-arrow-circle-left fa-2x"></i>
                    </button>
                    <span class="navbar-brand mb-0 h1 text-warning">Permohonan Lembur</span>
                </div>
            </nav>
            <div class="px-3 py-3">

                <form novalidate="" method="POST" action="{{ route('store_lembur') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01 " class="font-dark">Tanggal Awal</label>
                            {{-- <input class="form-control @error('start_date') is-invalid @enderror" id="validationCustom01"
                                type="date" name="start_date" placeholder="Tanggal Awal" required=""
                                value="{{ old('start_date') }}" autocomplete="off"> --}}

                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="left"
                                data-autoclose="true">
                                <input class="form-control @error('start_date') is-invalid @enderror" id="validationCustom01" type="text"
                                    name="start_date" value="{{ old('start_date') }}" autocomplete="off"><span
                                    class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>




                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01 " class="font-dark">Tanggal Akhir</label>

                            <div class="input-group clockpicker pull-center" data-placement="bottom" data-align="left"
                                data-autoclose="true">
                                <input class="form-control @error('end_date') is-invalid @enderror" type="text"
                                    name="end_date" value="{{ old('end_date') }}" autocomplete="off"><span
                                    class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>


                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01" class=" font-dark">Alasan Lembur</label>

                            <div class="input-group">

                                <textarea class="form-control @error('alasan') is-invalid @enderror" id="validationCustom01" type="text"
                                    placeholder="Alasan Lembur" name="alasan" required="" value="{{ old('alasan') }}" rows="5"></textarea>

                                @error('alasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>




                    </div>
                    <div class="text-center">

                        <button class="btn btn-secondary" type="submit">Buat Permohonan</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection



@section('script')
    <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker/jquery-clockpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker/highlight.min.js') }}"></script>
    <script src="{{ asset('assets/js/time-picker/clockpicker.js') }}"></script>
    <script>
        function goBack() {

            window.location.href = '/';
        }
    </script>
@endsection

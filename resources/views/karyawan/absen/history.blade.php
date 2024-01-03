@extends('karyawan.layouts.index')


@section('karyawan_content')
    <div class="position-fixed  border-top border-1 p-0" style="max-width: 500px;">
        <div>
            <nav class="navbar navbar-dark bg-transparent px-3" style="box-shadow: 0px 1px 3px 0px #ccc;">
                <div class="w-100 d-flex flex-row justify-content-between align-items-center">
                    <button class="btn btn-link text-dark px-0 py-0" onclick="goBack()">
                        <i class="fa fa-arrow-circle-left fa-2x"></i>
                    </button>
                    <span class="navbar-brand mb-0 h1 text-warning">History</span>
                </div>
            </nav>
            <div class="px-3 py-2">

                @foreach ($absensi as $item)
                    <div class="py-2">

                        <div class="bg-light w-100 h-100 py-2 px-2 d-flex justify-content-between align-items-center"
                            style="border-radius: 8px; box-shadow: 1px 1px 3px 0px #ccc;">
                            <div class="text-dark">

                                <h6><i class="fa fa-calendar"></i> {{ $item['tanggal_checkin'] }}</h6>
                                <span style="font-size: 13px;"><i class="fa fa-clock-o"></i> Masuk:
                                    {{ (new DateTime($item['check_in']))->format('H:i') }} | <i class="fa fa-clock-o"></i>
                                    Pulang: {{ (new DateTime($item['check_out']))->format('H:i') }}</span>
                            </div>
                            <div class="text-dark px-2">
                                @if ((new DateTime($setting->check_in))->format('H:i') >= (new DateTime($item['check_in']))->format('H:i'))
                                    <b class="text-success">ONTIME</b>
                                @else
                                    <b class="text-danger">LATE</b>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection



@section('script')
    <script>
        function goBack() {

            window.location.href = '/';
        }
    </script>
@endsection

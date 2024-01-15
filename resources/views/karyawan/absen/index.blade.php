
@extends('karyawan.layouts.index')


@section('karyawan_content')

<div class="position-fixed  border-top border-1" style="max-width: 500px;">
         <div>
                  <h1 class="text-center mt-2 fs-5 text-warning mt-4 mb-3">PT.Sertifikasi Instalasi Profesi Listrik Nusantara</h1>



                  <div class="">
                           <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/images/avtar/3.jpg') }}" alt="" class="rounded-circle" style="width: 100px; height: 100px;">

                           </div>


                           <div class="text-center text-dark">
                                    <p class="mb-0">{{ $user->name }}</p>
                                    <p class="mt-0">Jam Kerja {{ $setting['check_in'] }} - {{ $setting['check_out'] }}</p>
                           </div>

                  </div>



                  <div class="d-flex justify-content-evenly align-items-center mt-4 bg-light rounded" style="height:100px">
                           <div class="text-center" style="cursor: pointer;">
                                    <img src="{{ asset('assets/svg-icon/bookmart.svg') }}" onclick="Izin()" alt="" style="width:40px; height:40px;">
                                    <p class="text-dark">Permohonan izin</p>
                           </div>
                           <div class="text-center" style="cursor: pointer;" onclick="History()">
                                    <img src="{{ asset('assets/svg-icon/date-svgrepo-com.svg') }}" alt="" style="width:40px; height:40px;">
                                    <p class="text-dark ">History Kehadiran</p>
                           </div>
                           <div class="text-center" style="cursor: pointer;">
                                    <img src="{{ asset('assets/svg-icon/time-svgrepo-com.svg') }}" onclick="Lembur()" alt="" style="width:40px; height:40px;">

                                    <p class="text-dark">Pengajuan Lembur</p>
                           </div>

                  </div>

                  <div class="bg-light rounded pb-2 mt-1">
                           <div class="text-dark text-center mt-4 pt-2">
                                    <h3 class="fs-6">Kehadiran</h3>
                           </div>

                           <table class="table">
                                    <p class="text-dark text-center">Hari ini {{ $date }}</p>


                                    <thead>
                                             <tr>

                                                      <th scope="col">Foto </th>
                                                      <th scope="col">Jam Masuk</th>
                                                      <th scope="col">Foto </th>
                                                      <th scope="col">Jam Keluar</th>
                                             </tr>
                                    </thead>
                                    <tbody>
                                             <tr>
                                                      <td><img class="border rounded-circle shadow" src="uploads/{{@@$absensi['image_checkin'] ?? 'user.png'}}" alt="Gambar 1" style="width: 50px; height: 50px; object-fit: cover;"></td>
                                                      <td>{{ @@$absensi['check_in'] ?? '-' }}</td>
                                                      <td><img class="border rounded-circle shadow" src="uploads/{{@@$absensi['image_checkout'] ?? 'user.png'}}" alt="Gambar 1" style="width: 50px; height: 50px; object-fit: cover;"></td>
                                                      <td>{{ @@$absensi['check_out'] ?? '-' }}</td>
                                             </tr>

                                    </tbody>
                           </table>


                  </div>



                  <div class="d-grid gap-4 col-8 mx-auto mt-5">
                           <button class="btn {{ @@$absensi['check_out'] ? 'disabled btn-dark' : 'btn-warning ' }}" type="button" onclick="rekamKehadiran()">Rekam Kehadiran </button>
                  </div>




         </div>

</div>
@endsection



@section('script')
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>


    @if (session('success'))
    <script>
        $(document).ready(function() {

            $.notify({
                title: '<strong>Berhasil!!</strong>',
                message: "<p>{{ session('success') }}<p>"
            }, {
                type: 'success',
                allow_dismiss: true,
                newest_on_top: false,
                mouse_over: false,
                showProgressbar: true,
                spacing: 10,
                timer: 500,
                placement: {
                    from: 'top',
                    align: 'center'
                },
                offset: {
                    x: 30,
                    y: 30
                },
                delay: 1700,
                z_index: 10000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
        })
    </script>
    @endif
<script>

    function rekamKehadiran() {
        window.location.href = '/rekam_kehadiran'
    }

    function History() {
        window.location.href = '/history'
    }
    function Izin() {
        window.location.href = '/permohonan_izin'
    }
</script>
@endsection

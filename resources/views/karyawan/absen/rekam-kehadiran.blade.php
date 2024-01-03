@extends('karyawan.layouts.index')


@section('karyawan_content')
    <div class="position-fixed border-top border-1 p-0" style="max-width: 500px;">
        <div>
            <nav class="navbar navbar-dark bg-transparent px-3" style="box-shadow: 0px 1px 3px 0px #ccc;">
                <div class="w-100 d-flex flex-row justify-content-between align-items-center">
                    <button class="btn btn-link text-dark px-0 py-0" onclick="goBack()">
                        <i class="fa fa-arrow-circle-left fa-2x"></i>
                    </button>
                    <span class="navbar-brand mb-0 h1 text-warning">Rekam Kehadiran</span>
                </div>
            </nav>
            <div class="px-3 py-2">

                @if (@@$absensi->check_out === null)

                <div class="position-relative bg-light" style="height: 300px;  border-radius: 10px; ">
                    <video id="camera" style="max-width: 100%; min-width: 100%; border-radius: 10px; object-fit: cover;"
                        height="300" autoplay></video>
                    <canvas id="canvas" style="display:none;"></canvas>
                    <input type="hidden" name="foto" id="fotoInput">
                    <img id="img-view" height='300'
                        style="width: 100%; border-radius: 10px; display: none; object-fit: cover;" height="300"
                        alt="Hasil Jepretan" />
                    <div id="button_camera" class="w-100 position-absolute justify-content-center my-2"
                        style="display: none; bottom: 12px;">

                        <button id="captureButton" type="button"
                            class="btn btn-primary justify-content-center align-items-center"
                            style="width: 35px; height: 40px; display: flex;"><i class="fa fa-camera"></i></button>
                        <button id="refreshButton" type="button"
                            class="btn btn-primary justify-content-center align-items-center"
                            style="width: 35px; height: 40px; display: none;"><i class="fa fa-refresh"></i></button>
                    </div>
                </div>

                <div class="px-2 py-2">
                    <table>
                        <tr>
                            <td><b style="font-size: 14px;" class="text-dark">Nama</b></td>
                            <td class="px-3 text-dark" style="font-size: 14px;">:</td>
                            <td class="text-dark" style="font-size: 14px;">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td><b style="font-size: 14px;" class="text-dark">Jabatan</b></td>
                            <td class="px-3 text-dark" style="font-size: 14px;">:</td>
                            <td class="text-dark" style="font-size: 14px;">{{ $user->jabatans->jabatan }}</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-2 d-flex justify-content-evenly flex-row">
                    <button type="button" class="btn btn-success {{ !$absensi ? 'active' : '' }} disabled"
                        id="MasukButton">Masuk</button>
                    <button type="button" class="btn btn-danger {{ @@$absensi->check_in ? 'active' : '' }} disabled"
                        id="PulangButton">Pulang</button>
                </div>

                @else

                <div class="d-flex justify-content-center flex-column align-items-center " style="height: 70vh;">
                    <img src="assets/images/alert-icon.png" width="100" />
                    <h4 class="text-dark py-4 w-75 text-center">Kamu sudah melakukan absen hari ini!!</h4>
                </div>

                @endif
            </div>


        </div>

    </div>
@endsection



@section('script')

<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const video = document.getElementById('camera');
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');
            const MasukButton = document.getElementById('MasukButton');
            const PulangButton = document.getElementById('PulangButton');
            const buttonCapture = document.getElementById('button_camera')
            const buttonGetCapture = document.getElementById('captureButton')
            const buttonRefreshCapture = document.getElementById('refreshButton')
            const fotoInput = document.getElementById('fotoInput');
            const absensiForm = document.getElementById('absensiForm');
            const absensiFormPulang = document.getElementById('absensiFormPulang');
            const imageView = document.getElementById('img-view');

            // Mendapatkan akses ke kamera
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then((stream) => {
                    video.srcObject = stream;
                    video.height = 300;
                    buttonCapture.style.display = 'flex'
                })
                .catch((err) => {
                    console.error('Error accessing camera: ', err);
                });

            // Mengambil foto dari kamera dan menambahkannya ke input hidden
            captureButton.addEventListener('click', () => {

                const videoWidth = video.videoWidth;
                const videoHeight = video.videoHeight;

                // Sesuaikan dimensi canvas sesuai dengan aspek rasio video
                canvas.width = videoWidth;
                canvas.height = videoHeight;

                context.drawImage(video, 0, 0, canvas.width, canvas.height);

                const fotoDataUrl = canvas.toDataURL('image/png');
                fotoInput.value = fotoDataUrl;
                // Membuat form sesuai kebutuhan Anda
                // absensiForm.submit(); // Mengirim formulir masuk

                console.log(fotoDataUrl);

                buttonGetCapture.style.display = 'none'
                buttonRefreshCapture.style.display = 'flex'

                if (MasukButton.classList.contains('active')) {

                    MasukButton.classList.toggle('disabled')
                }

                if (PulangButton.classList.contains('active')) {

                    PulangButton.classList.toggle('disabled')
                }

                imageView.src = fotoDataUrl;
                imageView.style.display = 'block';
                video.style.display = 'none'
                // atau
                // absensiFormPulang.submit(); // Mengirim formulir pulang
            });

            refreshButton.addEventListener('click', () => {
                if (MasukButton.classList.contains('active')) {

                    MasukButton.classList.toggle('disabled')
                }

                if (PulangButton.classList.contains('active')) {

                    PulangButton.classList.toggle('disabled')
                }
                buttonGetCapture.style.display = 'flex'
                buttonRefreshCapture.style.display = 'none'

                imageView.src = '';
                imageView.style.display = 'none';
                video.style.display = 'block'
            })

        });

        function goBack() {

            window.location.href = '/';
        }

        $(document).ready(function() {

            $('#MasukButton').click(() => {
                upload('masuk')

                MasukButton.classList.toggle('disabled')
            })

            $('#PulangButton').click(() => {
                upload('pulang')

                PulangButton.classList.toggle('disabled')
            })

            function upload(absen) {
                var input = document.getElementById('fotoInput');
                var file = input.value;

                if (file) {
                    var formData = new FormData();
                    formData.append('image', file);
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                    console.log($('meta[name="csrf-token"]').attr('content'))
                    $.ajax({
                        url: '/absen',
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(response) {
                            console.log(response, 'Ini response')

                            if (response.valid) {

                                $.notify({
                                    title: absen === 'masuk' ? '<strong>Absen masuk berhasil!!</strong>' : '<strong>Absen pulang berhasil!!</strong>',
                                    message: response.message
                                    },
                                    {
                                    type:'success',
                                    allow_dismiss:true,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    showProgressbar: true,
                                    spacing:10,
                                    timer:500,
                                    placement:{
                                        from:'top',
                                        align:'center'
                                    },
                                    offset:{
                                        x:30,
                                        y:30
                                    },
                                    delay:1700,
                                    z_index:10000,
                                    animate:{
                                        enter:'animated fadeInDown',
                                        exit:'animated fadeOutUp'
                                    }
                                });

                                setTimeout(() => {
                                    window.location.href = '/'
                                }, 2000);
                            } else {
                                $.notify({
                                    title: absen === 'masuk' ? '<strong>Absen masuk gagal!!</strong>' : '<strong>Absen pulang gagal!!</strong>',
                                    message: response.message
                                    },
                                    {
                                    type:'danger',
                                    showProgressbar: true,
                                    allow_dismiss:true,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    spacing:10,
                                    delay: 1700,
                                    timer:500,
                                    placement:{
                                        from:'top',
                                        align:'center'
                                    },
                                    offset:{
                                        x:30,
                                        y:30
                                    },
                                    z_index:10000,
                                    animate:{
                                        enter:'animated fadeInDown',
                                        exit:'animated fadeOutUp'
                                    }
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error uploading file. Status: ' + status);
                        }
                    });
                } else {
                    console.error('No file selected.');
                }
            }
        })
    </script>

@endsection

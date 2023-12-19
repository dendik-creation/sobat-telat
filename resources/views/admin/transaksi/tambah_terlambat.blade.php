@extends('admin.template')
@section('content_admin')
    <section class="row">
        @include('alert')
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card" id="nis_search">
                        <div class="container px-3 py-3">
                            <div class="fs-6 mb-2">1. &nbsp;Cari NIS Siswa</div>
                            <form id="form_nis" class="position-relative">
                                @csrf
                                <input type="text" autofocus name="nis_check" id="nis_check" autocomplete="off"
                                    class="form-control form-control-lg pe-5" maxlength="4" pattern="[0-9]{4}"
                                    title="Hanya 4 Angka Untuk NIS" required>
                                <button class="position-absolute btn btn-sm btn-primary" style="top: 7px; right : 12px;">
                                    <i class="bi bi-search mb-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card d-none" id="search_result">
                        <div class="container px-3 py-3">
                            <div class="fs-6 mb-2">2. &nbsp;Hasil Pencarian NIS</div>
                            <div class="container">
                                <div class="d-flex flex-column flex-md-row justify-content-start mb-1">
                                    <span class="fw-bold" style="width: 80px">NIS</span>
                                    <span class="fw-medium" id="nis_result">5939</span>
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-start mb-1">
                                    <span class="fw-bold" style="width: 80px">Nama</span>
                                    <span class="fw-medium" id="nama_result">#</span>
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-start mb-1">
                                    <span class="fw-bold" style="width: 80px">Kelas</span>
                                    <span class="fw-medium" id="kelas_result">#</span>
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-start mb-1">
                                    <span class="fw-bold" style="width: 80px">Gender</span>
                                    <span class="fw-medium" id="gender_result">#</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ url('send-terlambat') }}" method="POST" id="send_form">
                    @csrf
                    <div class="col-12">
                        <div class="card" id="jam_pembelajaran">
                            <div class="container px-3 py-3">
                                <div class="fs-6 mb-2">3. &nbsp;Siswa Masuk Jam Pembelajaran Ke</div>
                                <select required name="jam_ke" id="jam_ke" class="form-control form-control-lg">
                                    <option value="" selected disabled>Pilih Jam Pembelajaran</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="decision" id="decision">
                    <input type="hidden" name="nis" id="nis_send">
                    <div class="row">
                        <div class="col-12">
                            <div class="card d-none" id="keterangan_container">
                                <div class="container px-3 py-3">
                                    <div class="fs-6 mb-2">4. &nbsp;Alasan Siswa Terlambat</div>
                                    <textarea required name="keterangan" id="keterangan" cols="30" rows="3" class="form-control form-control-lg"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="send_container">
                        <div class="col-12 mb-3 col-md-8 mb-md-0">
                            <div class="d-flex justify-content-center align-items-center">
                                <button value="with_print" id="with_print"
                                    class="btn btn-primary btn-lg w-100 d-flex justify-content-center align-items-center gap-3">
                                    <i class="bi bi-printer-fill mb-3"></i>
                                    <span class="fw-bold">Simpan & Cetak</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 mb-3 col-md-4 mb-md-0">
                            <div class="d-flex justify-content-center align-items-center">
                                <button value="save_only" id="save_only"
                                    class="btn btn-success btn-lg w-100 d-flex justify-content-center align-items-center gap-3">
                                    <i class="bi bi-floppy-fill mb-3"></i>
                                    <span class="fw-bold">Hanya Simpan</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </section>

    {{-- AnimeJs CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"
        integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        let first = true;
        anime({
            targets: ['#nis_search', '#search_result', '#jam_pembelajaran', '#keterangan_container',
                '#send_container'
            ],
            scaleY: 0,
            duration: 0,
        });

        window.onload = () => {
            setTimeout(() => {
                anime({
                    targets: '#nis_search',
                    scaleY: 1,
                    duration: 300,
                    easing: 'easeInOutExpo',
                });
            }, 150)
        }

        function nisFound(first) {
            anime({
                targets: '#search_result',
                scaleY: 0,
                duration: 350,
                easing: 'easeInOutExpo',
            });
            setTimeout(() => {
                anime({
                    targets: '#search_result',
                    scaleY: 1,
                    duration: 500,
                    easing: 'easeInOutExpo',
                    delay: 0
                });
                anime({
                    targets: '#jam_pembelajaran',
                    scaleY: 1,
                    duration: 500,
                    easing: 'easeInOutExpo',
                    delay: 150
                });
                anime({
                    targets: '#keterangan_container',
                    scaleY: 1,
                    duration: 500,
                    easing: 'easeInOutExpo',
                    delay: 300
                });
                anime({
                    targets: '#send_container',
                    scaleY: 1,
                    duration: 500,
                    easing: 'easeInOutExpo',
                    delay: 450
                });
            }, first ? 250 : 500)
        }
    </script>

    <script>
        let formNis = document.getElementById('form_nis');
        let sendForm = document.getElementById('send_form');
        let nisCheck = document.getElementById('nis_check');

        formNis.addEventListener('submit', findNis);
        sendForm.addEventListener('submit', beforeSubmit);

        function findNis(e) {
            e.preventDefault();
            if (nisCheck.value !== document.getElementById('nis_send').value) {
                $.ajax({
                    type: 'get',
                    url: "{{ url('/check-nis') }}",
                    data: {
                        nis: nisCheck.value
                    },
                    success: function(result) {
                        nisFound(first);
                        first = false;
                        $("#search_result").removeClass('d-none');
                        $("#keterangan_container").removeClass('d-none');
                        $("#send_container").removeClass('d-none');
                        $("#nis_send").val(result.nis);
                        //
                        setTimeout(() => {
                            $("#nis_result").html(result.nis);
                            $("#nama_result").html(result.nama);
                            $("#kelas_result").html(result.kelas.kelas);
                            $("#gender_result").html(result.gender);
                        }, 500)
                    },
                    error: function(xhr, status, err) {
                        if (window.innerWidth <= 768) {
                            toastResult("top", "center", xhr.responseJSON, "failed")
                        } else {
                            toastResult("bottom", "right", xhr.responseJSON, "failed")
                        }
                    }
                })
            } else {
                if (window.innerWidth <= 768) {
                    toastResult("top", "center", "NIS Sudah Ditemukan", "failed")
                } else {
                    toastResult("bottom", "right", "NIS Sudah Ditemukan", "failed")
                }
            }
        }

        function beforeSubmit(event) {
            event.preventDefault();
            let decision = event.submitter.value;
            $("#decision").val(decision);
            $("#with_print").prop("disabled", true);
            $("#save_only").prop("disabled", true);
            if (decision == 'with_print') {
                $("#with_print").html('Loading')
            } else {
                $("#save_only").html('Loading')
            }
            setTimeout(() => {
                $("#send_form").submit();
            }, 100)
        }
    </script>
@endsection

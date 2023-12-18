@extends('admin.template')
@section('content_admin')
    <link rel="stylesheet" href="/assets/compiled/css/iconly.css">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css">


    @include('alert')
    <section class="row">
        <div class="d-flex flex-md-column flex-column-reverse">
            <div class="row">
                <div class="col-12 col-md-6" id="total_terlambat">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-3 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldDocument"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-extrabold fs-3">{{ $telats }}</h6>
                                    <h6 class="text-muted font-semibold">Total Keseluruhan Terlambat</h6>
                                    <a href="{{ url('data-terlambat') }}" class="btn btn-lg btn-light-success w-100">
                                        <span class="fw-semibold fs-6">Lihat Data Terlambat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6" id="total_siswa">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-3 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldUser"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="font-extrabold fs-3">{{ $users }}</h6>
                                    <h6 class="text-muted font-semibold">Total Siswa</h6>
                                    <a href="{{ url('data-siswa') }}" class="btn btn-lg btn-light-primary w-100">
                                        <span class="fw-semibold fs-6">Lihat Data Siswa</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="siswa_terlambat_alamak">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Siswa TJKT Terlambat 😱🤯?</h4>
                        </div>
                        <div class="card-body">
                            <a href="/tambah-terlambat"
                                class="btn btn-xl w-100 btn-primary gap-4 d-flex flex-md-row flex-column justify-content-center">
                                <i class="bi bi-floppy-fill mb-md-3 mb-1 me-3 fs-2"></i>
                                <div class="fs-2 text-start fw-bold">Rekap Mereka</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- AnimeJs CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"
        integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        anime({
            targets: ['#total_terlambat', '#total_siswa', '#siswa_terlambat_alamak'],
            scaleY: 0,
            duration: 0,
        });
        setTimeout(() => {
            anime({
                targets: '#total_terlambat',
                scaleY: 1,
                duration: 500,
                easing: 'easeInOutExpo',
                delay: 0
            });
            anime({
                targets: '#total_siswa',
                scaleY: 1,
                duration: 500,
                easing: 'easeInOutExpo',
                delay: 150
            });
            anime({
                targets: '#siswa_terlambat_alamak',
                scaleY: 1,
                duration: 500,
                easing: 'easeInOutExpo',
                delay: 300
            });
        }, 500);
    </script>
@endsection

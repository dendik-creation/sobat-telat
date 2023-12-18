<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>



    <link rel="shortcut icon" href="/assets/compiled/svg/clock-history.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/custom.css">
    <link rel="stylesheet" href="/assets/extensions/toastify-js/src/toastify.css">
</head>

<body>
    <script src="/assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start gap-3 align-items-center">
                            <i class="bi bi-clock-history mb-3 fs-5"></i>
                            <h1 class="fs-5 m-0">Sobat Telat</h1>
                        </div>
                        <div class="sidebar-toggler mb-1">
                            <span class="sidebar-hide d-xl-none d-block">
                                <i class="bi bi-x-circle-fill text-success"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                            <a href="/" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>


                        <li class="sidebar-item has-sub {{ Request::is('data-siswa') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-database-fill-gear"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item {{ Request::is('data-siswa') ? 'active' : '' }} ">
                                    <a href="/data-siswa" class="submenu-link">Data Siswa</a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="sidebar-item has-sub {{ Request::is('data-terlambat') || Request::is('tambah-terlambat') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-receipt-cutoff"></i>
                                <span>Transaksi Data</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item {{ Request::is('data-terlambat') ? 'active' : '' }}">
                                    <a href="/data-terlambat" class="submenu-link">Data Keterlambatan</a>
                                </li>
                                <li class="submenu-item {{ Request::is('tambah-terlambat') ? 'active' : '' }}">
                                    <a href="/tambah-terlambat" class="submenu-link">Tambah Keterlambatan</a>
                                </li>
                            </ul>
                        </li>

                        {{-- Fixed --}}
                        <li class="sidebar-item position-fixed" style="bottom: 1em; cursor : default;">
                            <div class="sidebar-link">
                                <i class="bi bi-phone" id="device_icon"></i>
                                <span id="device_type">Mobile Mode</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3 d-flex justify-content-between align-items-center">
                <a href="#" class="burger-btn w-25 d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <div class="btn-group d-block d-xl-none">
                    <div class="dropdown">
                        <button type="button"
                            class="btn btn-sm dropdown-toggle d-flex justify-content-center align-items-center"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar bg-success me-2">
                                <img src="/assets/compiled/jpg/{{ auth()->user()->gender == 'L' ? '2.jpg' : '3.jpg' }}"
                                    alt="" srcset="">
                                <span class="avatar-status bg-success"></span>
                            </div>
                            <span class="me-1 d-md-block d-none">Halo, {{ auth()->user()->nama }}</span>
                        </button>
                        <div class="dropdown-menu me-3">
                            <button data-bs-toggle="modal" data-bs-target="#editProfile" type="button"
                                onclick="profilReady()"
                                class="dropdown-item mb-2 d-flex justify-content-start align-items-center">
                                <i class="bi bi-person-rolodex mb-2 me-2"></i>
                                <span>Edit Profil</span>
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#ubahPassword" type="button"
                                class="dropdown-item mb-2 d-flex justify-content-start align-items-center">
                                <i class="bi bi-key-fill mb-2 me-2"></i>
                                <span>Ubah Password</span>
                            </button>
                            {{-- Special --}}
                            <button data-bs-toggle="modal" data-bs-target="#newPassword" id="new_pw_modal"
                                type="button"
                                class="dropdown-item mb-2 d-none d-flex justify-content-start align-items-center">
                                <i class="bi bi-key-fill mb-2 me-2"></i>
                                <span>Special</span>
                            </button>
                            {{--  --}}
                            <button data-bs-toggle="modal" data-bs-target="#border-less-logout" type="button"
                                class="dropdown-item mb-2 d-flex justify-content-start align-items-center">
                                <i class="bi bi-box-arrow-right mb-2 me-2"></i>
                                <span>Logout</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h3>{{ $title }}</h3>
                <div class="btn-group d-none d-xl-block">
                    <div class="dropdown">
                        <button type="button"
                            class="btn btn-sm dropdown-toggle d-flex justify-content-center align-items-center"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar bg-success me-2">
                                <img src="/assets/compiled/jpg/{{ auth()->user()->gender == 'L' ? '2.jpg' : '3.jpg' }}"
                                    alt="" srcset="">
                                <span class="avatar-status bg-success"></span>
                            </div>
                            <span class="me-1 d-md-block d-none">Halo, {{ auth()->user()->nama }}</span>
                        </button>
                        <div class="dropdown-menu me-3">
                            <button data-bs-toggle="modal" data-bs-target="#editProfile" type="button"
                                onclick="profilReady()"
                                class="dropdown-item mb-2 d-flex justify-content-start align-items-center">
                                <i class="bi bi-person-rolodex mb-2 me-2"></i>
                                <span>Edit Profil</span>
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#ubahPassword" type="button"
                                class="dropdown-item mb-2 d-flex justify-content-start align-items-center">
                                <i class="bi bi-key-fill mb-2 me-2"></i>
                                <span>Ubah Password</span>
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#border-less-logout" type="button"
                                class="dropdown-item mb-2 d-flex justify-content-start align-items-center">
                                <i class="bi bi-box-arrow-right mb-2 me-2"></i>
                                <span>Logout</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">
                @yield('content_admin')
            </div>
        </div>
    </div>

    {{-- Logout Modals --}}
    <div class="modal fade text-left modal-borderless" id="border-less-logout" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Logout</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Apakah Anda Ingin Logout
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
                        <span class="d-block">Tidak</span>
                    </button>
                    <form action="{{ url('/logout') }}" method="POST" id="logout_form">
                        @csrf
                        <button type="submit" class="btn btn-light-primary ms-1" id="confirm_yes"
                            data-bs-dismiss="modal">
                            <span class="d-block">Ya, Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Profil Saya --}}
    <div class="modal fade text-left" id="editProfile" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Edit Profil Saya</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="#" onsubmit="update()">
                    @csrf
                    <div class="modal-body">
                        <label for="my_nis">Username</label>
                        <div class="form-group">
                            <input required id="my_nis" name="my_nis" type="text" class="form-control">
                        </div>
                        <label for="my_nama">Nama</label>
                        <div class="form-group">
                            <input required id="my_nama" name="my_nama" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <span class="">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                            <span class="">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Konfirmasi Password --}}
    <div class="modal fade text-left" id="ubahPassword" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Konfirmasi Password Lama</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="#" onsubmit="checkPw()">
                    <div class="modal-body">
                        <label for="current_pw" class="mb-1">Password Sekarang</label>
                        <div class="form-group">
                            <input required id="current_pw" name="current_pw" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <span class="">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" id="confirm_current_pw">
                            <span class="">Konfirmasi</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Ubah Password --}}
    <div class="modal fade text-left" id="newPassword" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Buat Password Baru</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="#" onsubmit="updatePw()">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <div class="d-flex justify-content-start align-items-center">
                                <i class="bi bi-exclamation-circle-fill mb-2 me-2"></i>
                                <span>Minimal 8 Karakter</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <i class="bi bi-exclamation-circle-fill mb-2 me-2"></i>
                                <span>Terdiri dari huruf dan angka</span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <i class="bi bi-exclamation-circle-fill mb-2 me-2"></i>
                                <span>Ingat password ketika login</span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="new_pw" class="mb-1">Password Baru</label>
                            <div class="form-group">
                                <input required id="new_pw" name="new_pw" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="new_pw_confirm" class="mb-1">Konfirmasi Password Baru</label>
                            <div class="form-group">
                                <input required id="new_pw_confirm" name="new_pw_confirm" type="password"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <span class="">Close</span>
                        </button>
                        <button type="submit" class="btn btn-success ms-1" id="confirm_new_pw">
                            <span class="">Perbarui</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="/assets/compiled/js/app.js"></script>
    <script src="/assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="/assets/static/js/components/dark.js"></script>
    <script src="/assets/extensions/jquery/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var userAgent = navigator.userAgent;
            var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(userAgent);
            if (isMobile) {
                $("#device_icon").removeClass("bi-laptop");
                $("#device_icon").addClass("bi-phone");
                $("#device_type").html('Mobile');
            } else {
                $("#device_icon").removeClass("bi-phone");
                $("#device_icon").addClass("bi-laptop");
                $("#device_type").html('Desktop');
            }
        })
    </script>

    <script>
        function profilReady() {
            let nis = $("#my_nis").val()
            let nama = $("#my_nama").val()
            if (nis == "" || nama == "") {
                $.ajax({
                    type: "get",
                    url: `{{ url('/my-profile') }}`,
                    success: function(data) {
                        $("#my_nis").val(data.nis)
                        $("#my_nama").val(data.nama)
                    },
                    error: function() {
                        //
                    }
                })
            }
        }

        function update() {
            event.preventDefault();
            const data = {
                _token: $("[name='_token']").val(),
                nis: $("#my_nis").val(),
                nama: $("#my_nama").val(),
            }

            $.ajax({
                type: 'put',
                url: `{{ url('/my-profile') }}`,
                data: data,
                success: function() {
                    window.location.reload()
                },
                error: function() {
                    window.location.reload()
                }
            })
        }

        function checkPw() {
            event.preventDefault()
            const data = {
                current_pw: $("#current_pw").val()
            }

            $("#confirm_current_pw").html('Loading')

            $.ajax({
                type: 'get',
                url: `{{ url('/check-pw') }}`,
                data: data,
                success: function(data) {
                    $("#current_pw").val("");
                    $("#confirm_current_pw").html('Konfirmasi')
                    if (data) {
                        $("#new_pw_modal").click();
                    }
                },
                error: function(xhr, status, err) {
                    $("#confirm_current_pw").html('Konfirmasi')
                    toastResult("bottom", "right", xhr.responseJSON, "failed")
                }
            })
        }

        function updatePw() {
            event.preventDefault();
            const data = {
                _token: $("[name='_token']").val(),
                new_pw: $("#new_pw").val(),
                new_pw_confirm: $("#new_pw_confirm").val()
            }
            const regex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
            if (regex.test(data.new_pw) && regex.test(data.new_pw_confirm)) {
                if (data.new_pw == data.new_pw_confirm) {
                    $.ajax({
                        type: 'put',
                        url: `{{ url('/new-pw') }}`,
                        data: data,
                        success: function(data) {
                            toastResult("bottom", "right", "Bersiap Logout", "success");
                            setTimeout(() => {
                                $("#logout_form").submit()
                            }, 1000);
                        },
                        error: function() {
                            //
                        }
                    })
                }else{
                    toastResult("bottom", "right", "Password Konfirmasi Tidak Cocok", "failed")
                }
            } else {
                toastResult("bottom", "right", "Format Password Tidak Sesuai", "failed")
            }
        }
    </script>
</body>

</html>

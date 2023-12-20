@extends('admin.template')
@section('content_admin')
    <link rel="stylesheet" href="/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/assets/compiled/css/table-datatable-jquery.css">
    <style>
        #export_btn:disabled::before{
            position: absolute;
            content: '';
            width : 150%;
            height: 4px;
            background-color: #1c1c1c;
            rotate: -14deg;
        }
        #export_btn:disabled::after{
            position: absolute;
            content: '';
            width : 150%;
            height: 4px;
            background-color: #1c1c1c;
            rotate: -30deg;
        }
    </style>
    <div class="row">
        <div class="col-12">
            @include('alert')
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="fs-6 d-md-none d-block">Data Keterlambatan Siswa</h4>
                    <h4 class="d-none d-md-block">Data Keterlambatan Siswa</h4>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <button id="clear_filter" onclick="window.location.href = '/data-terlambat'"
                            class="btn btn-light-danger d-none d-flex justify-content-center align-items-center">
                            <i class="bi bi-x-octagon-fill mb-2 me-md-2"></i>
                            <small class="d-none d-md-block">Bersihkan Filter</small>
                        </button>
                        <button id="export_btn" onclick="readyExport()"
                        @disabled($terlambats->count() == 0)
                            class="btn position-relative overflow-hidden btn-warning d-flex justify-content-center align-items-center">
                            <i class="bi bi-file-earmark-arrow-down-fill mb-2 me-md-2"></i>
                            <small class="d-none d-md-block">Export</small>
                        </button>
                        <button onclick="readyFn()" class="btn btn-primary d-flex justify-content-center align-items-center"
                            data-bs-toggle="modal" data-bs-target="#filterModal">
                            <i class="bi bi-funnel-fill mb-2 me-md-2"></i>
                            <small class="d-none d-md-block">Filter</small>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive datatable-minimal">
                        <table class="table" id="table2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Masuk Jam Ke</th>
                                    <th>Alasan</th>
                                    <th>Waktu Terlambat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($terlambats as $i => $item)
                                    <tr>
                                        <td class="barcode-text">{{ $i + 1 }}</td>
                                        <td>{{ $item->user->nis }}</td>
                                        <td>{{ $item->user->nama }}</td>
                                        <td>{{ $item->user->kelas->kelas }}</td>
                                        <td>
                                            @if ($item->jam_ke)
                                                {{ $item->jam_ke }}
                                                @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ date_format(date_create($item->waktu_terlambat), 'd M Y | H:i') }}</td>
                                        <td>
                                            <a href="{{ url('cetak-terlambat/' . $item->id) }}" target="_blank"
                                                class="btn btn-light-warning">
                                                <i class="bi bi-printer-fill mb-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Aksi Filter Modal --}}
    <div class="modal fade text-left" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel19">Filter Data</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('data-terlambat') }}" method="GET">
                    <div class="modal-body">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <div
                                            class="fs-6 fw-bold d-flex w-100 justify-content-start gap-2 align-items-center">
                                            <div>Berdasarkan Kelas</div>
                                            <i class="bi bi-funnel-fill mb-2 d-none" id="active_filter_kelas"></i>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="container">
                                            <select name="kelas_id" id="kelas_id" class="form-control form-control-lg">
                                                {{-- Ajax Kelas Request DOM --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        <div
                                            class="fs-6 fw-bold d-flex w-100 justify-content-start gap-3 align-items-center">
                                            <div>Berdasarkan Rentang Tanggal</div>
                                            <i class="bi bi-funnel-fill mb-2 d-none" id="active_filter_tanggal"></i>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="container">
                                            <div class="d-flex justify-content-start gap-2 align-items-center">
                                                <input type="text" readonly placeholder="Tanggal Awal"
                                                    autocomplete="off" name="start_date" id="start_date"
                                                    class="form-control form-control-lg">
                                                <span>-</span>
                                                <input type="text" readonly placeholder="Tanggal Akhir"
                                                    name="end_date" autocomplete="off" id="end_date"
                                                    class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <div
                                            class="fs-6 fw-bold d-flex w-100 justify-content-start gap-2 align-items-center">
                                            <div>Berdasarkan NIS Siswa</div>
                                            <i class="bi bi-funnel-fill mb-2 d-none" id="active_filter_siswa"></i>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="container">
                                            <input type="text" maxlength="4" pattern="[0-9]{4}"
                                                title="Hanya 4 Angka Untuk NIS" placeholder="NIS Siswa"
                                                autocomplete="off" name="nis_siswa" id="nis_siswa"
                                                class="form-control form-control-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <span class="">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                            <span class="">Filter</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/extensions/jquery/jquery.min.js"></script>
    <script src="/assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/static/js/pages/datatables.js"></script>

    {{-- Light Picker CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/litepicker/2.0.12/litepicker.js"
        integrity="sha512-ZbnsrTCJAJWynwgi3ndt7jcjwrJfHNzUh/mZakBRhZG8lYgMVtZLxY2CG4GuONoER9E8iiuupt4fnrNfXy+aGA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/litepicker/2.0.12/plugins/mobilefriendly.min.js"
        integrity="sha512-oGLJsXoz/9rjlOQ+iUaOZo/S0IOlN35P/Iv5JdYAUP3TaW2hg0FvhsW3loRAbET59xFCSAwnsc7i9ULVnZuAtQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const picker = new Litepicker({
            element: document.getElementById('start_date'),
            elementEnd: document.getElementById('end_date'),
            singleMode: false,
            allowRepick: true,
            plugins: ['mobilefriendly'],
            tooltipText: {
                one: 'Rentang Hari',
                other: 'Rentang Hari'
            },
            tooltipNumber: (totalDays) => {
                return totalDays - 1;
            },
        })
    </script>


    <script>
        window.onload = () => {
            let params = new URLSearchParams(window.location.search);
            let select = document.getElementById('kelas_id');
            if (params.get('kelas_id') || params.get('start_date') || params.get('end_date') || params.get(
                    'nis_siswa')) {
                $("#clear_filter").removeClass('d-none');
            }
        }


        function readyFn() {
            kelasReady();
            tanggalReady();
            nisReady();
        }

        function kelasReady() {
            // Params
            let params = new URLSearchParams(window.location.search);

            let kelasSelect = document.getElementById('kelas_id');
            if (kelasSelect.querySelector('option') == null) {
                const optDefault = document.createElement('option');
                optDefault.value = "Fara";
                optDefault.innerHTML = "Pilih Kelas";
                $("#kelas_id").append(optDefault);
                $("#kelas_id").find('option[value="Fara"]').prop('disabled', true);
                $.ajax({
                    type: 'get',
                    url: "{{ url('/kelas?type=siswa') }}",
                    success: function(data) {
                        data.forEach((item) => {
                            const opt = document.createElement('option');
                            opt.value = item.id;
                            opt.innerHTML = item.kelas;
                            $("#kelas_id").append(opt);
                        })
                        if (params.get('kelas_id')) {
                            $("#active_filter_kelas").removeClass('d-none');
                            $("#kelas_id").val(params.get('kelas_id'));
                        }
                    }
                })
            }
        }

        function tanggalReady() {
            // Params
            let params = new URLSearchParams(window.location.search);
            if (params.get('start_date') && params.get('end_date')) {
                $("#active_filter_tanggal").removeClass('d-none');
                $("#start_date").val(params.get('start_date'))
                $("#end_date").val(params.get('end_date'))
            }
        }

        function nisReady() {
            let params = new URLSearchParams(window.location.search);
            if (params.get('nis_siswa')) {
                $("#active_filter_siswa").removeClass('d-none');
                $("#nis_siswa").val(params.get('nis_siswa'))
            }
        }

        function getParams() {
            let params = new URLSearchParams(window.location.search);
            let sendParams = [];
            params.forEach((val, key) => {
                sendParams[key] = val;
            });
            return sendParams;
        }

        function readyExport() {
            let redirectURL = new URL(`${window.location.origin}/export-terlambat`);
            let paramList = getParams();
            for (var key in paramList) {
                if (paramList.hasOwnProperty(key)) {
                    redirectURL.searchParams.set(key, paramList[key]);
                }
            }
            window.open(redirectURL.toString(), '_blank');
        }
    </script>
@endsection

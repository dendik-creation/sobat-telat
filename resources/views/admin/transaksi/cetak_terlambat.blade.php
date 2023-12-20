<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="shortcut icon" href="/assets/compiled/svg/clock-history.svg" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono&display=swap');

        * {
            font-size: 12px;
            font-family: 'JetBrains Mono', sans-serif;
        }

        .ticket {
            /* Default 155px */
            width: 200px;
            max-width: 200px;
        }
        .signature-area{
            /* Default 155px */
            width: 200px;
            height: 70px;
        }
    </style>
</head>

<body class="bg-white">
    <div class="ticket">
        <center class="mb-1">
            <i class="bi bi-clock-history fs-1 mx-3"></i>
        </center>
        <div class="fw-bold fs-5 text-center mb-2">Surat Keterangan <span class="fs-5 text-uppercase" style="letter-spacing: 8px">Terlambat</span> <br> TJKT SMKN 2 Kudus</div>
        <div class="mb-2 text-center">Menerangkan bahwa, siswa berikut</div>
        <div class="mb-1 border border-2 border-end-0 border-start-0 py-2" style="border-style: dashed !important; border-right : none !important; border-left : none !important">
            <div class="mb-1">
                <div class="fw-semibold">NIS</div>
                <div class="">{{ $terlambat->user->nis }}</div>
            </div>
            <div class="mb-1">
                <div class="fw-semibold">Nama</div>
                <div class="">{{ $terlambat->user->nama }}</div>
            </div>
            <div class="mb-1">
                <div class="fw-semibold">Kelas</div>
                <div class="">{{ $terlambat->user->kelas->kelas }}</div>
            </div>
            <div class="mb-1">
                <div class="fw-semibold">Waktu Keterlambatan</div>
                <div class="">{{ date_format(date_create($terlambat->waktu_terlambat), 'd M Y - H:i') }}</div>
            </div>
            <div class="mb-1">
                <div class="fw-semibold">Alasan</div>
                <div class="">{{ $terlambat->keterangan }}</div>
            </div>
        </div>
        <div class="mb-3 text-center"><span class="fw-bold">Diperbolehkan <br></span> mengikuti pembelajaran mulai jam ke
            <span class="fw-bold fs-5">{{ $terlambat->jam_ke }}</span>
        </div>
        <center>
            <div class="">Mengetahui,</div>
            <div class="">Guru BK</div>
            {{-- Signature --}}
            <div class="signature-area"></div>
            <div class="">{{ auth()->user()->nama }}</div>
        </center>
    </div>

    <script>
        window.onload = () => window.print()
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="/assets/compiled/svg/clock-history.svg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/assets/compiled/css/custom.css">
</head>
<body class="bg-white">
    <div class="mt-4">
        <h3 class="">Laporan Data Keterlambatan Siswa TJKT</h3>
        <div class="d-flex justify-content-start align-items-center gap-2 mb-2">
            <div class="">Tanggal Dicetak :</div>
            <span>{{ date('d F Y - H : i') }}</span>
        </div>
        <div class="d-flex justify-content-start align-items-center gap-2 mb-2">
            <div class="">Total Keterlambatan :</div>
            <span>{{ $terlambats->count() }} Kali</span>
        </div>

        <table class="table table-striped">
            <thead class="bg-primary">
                <th class="text-white">No</th>
                <th class="text-white">NIS</th>
                <th class="text-white">Nama</th>
                <th class="text-white">Kelas</th>
                <th class="text-white">Alasan</th>
                <th class="text-white">Waktu Terlambat</th>
            </thead>
            <tbody>
                @foreach ($terlambats as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->user->nis }}</td>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->user->kelas->kelas }}</td>
                        <td>
                            @if($item->keterangan)
                            {{ $item->keterangan }}
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ date_format(date_create($item->waktu_terlambat), "d M Y | H:i") }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.onload = () => window.print()
    </script>
</body>
</html>


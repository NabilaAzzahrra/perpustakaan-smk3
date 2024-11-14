<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Mahasiswa</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            /* Adjusted for A4 portrait height (297mm minus padding and border) */
            outline: 2cm #FFEAEA solid;
        }

        td {
            padding-top: 5px;
        }

        .kp {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .logo {
            text-align: center;
            font-size: small;
        }

        .text {
            text-align: center;
            margin-top: 15px;
        }

        .cntr {
            font-size: small;
            text-align: left;
            margin-left: 40px;
            margin-right: 40px;
        }

        .translation {
            display: block;
            font-size: small;
            margin-top: -9px;
            font-style: italic;
        }

        table {
            border-collapse: collapse;
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 10px;
        }

        .ini {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: small;
            padding: 0;
        }

        .ttd {
            text-align: left;
            font-size: small;
            padding: 0px;
            margin-top: -10px;
            font-style: italic;
        }

        .ttd1 {
            text-align: left;
            font-size: small;
            padding: 0px;
        }

        .left {
            padding-left: 10px;
        }

        .footer {
            background: #204b8c;
            color: #fff;
            text-align: center;
            font-size: small;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .ket {
            margin-left: 290px;
        }

        body {
            font-family: 'Tahoma';
        }

        .tengah {
            text-align: center;
        }

        .page {
            width: 210mm;
            /* Adjusted for A4 portrait width */
            min-height: 297mm;
            /* Adjusted for A4 portrait height */
            padding: 0mm;
            margin: 0mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .page::before {
            content: "";
            position: ;
            top: 0;
            left: 0;
            width: 189px;
            height: 189px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .page::after {
            content: "";
            position: ;
            bottom: 0;
            right: 0;
            width: 794px;
            height: 49px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @page {
            size: A4 portrait;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                padding: 0mm;
                margin: 0mm auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .page::before {
                content: "";
                position: ;
                top: 0;
                left: 0;
                width: 189px;
                height: 189px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .page::after {
                content: "";
                position: ;
                bottom: 0;
                right: 0;
                width: 794px;
                height: 49px;
                background-size: cover;
                background-repeat: no-repeat;
            }
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="book">
        <div class="page" id="result">
            <div class="-ml-[585px]">
                <img src="{{ asset('img/graphic.png') }}" alt="" width="15%" class="mx-auto">
            </div>
            <div class=" top-0 left-0 right-0 text-center -mt-[160px]">
                <img src="{{ asset('img/logo.png') }}" width="10%" alt="Logo" class="mx-auto">
            </div>
            <div class=" mb-4 left-0 right-0 text-center text-[#00426D] text-sm font-extrabold">
                TASIKMALAYA
            </div>
            <div class=" mb-4 left-0 right-0 text-center text-sm font-bold">
                LAPORAN PERPUSTAKAAN <br> POLITEKNIK LP3I KAMPUS TASIKMALAYA
            </div>
            <table class="border border-1 border-black">
                <thead>
                    <tr>
                        <th class="border border-1 border-black">NO</th>
                        <th class="border border-1 border-black">KODE PEMINJAMAN</th>
                        <th class="border border-1 border-black">NAMA</th>
                        <th class="border border-1 border-black">JUMLAH BUKU</th>
                        <th class="border border-1 border-black">TANGGAL PEMINJAMAN</th>
                        <th class="border border-1 border-black">TANGGAL PENGEMBALIAN</th>
                        <th class="border border-1 border-black">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($peminjaman as $f)
                        <tr>
                            <td class="border border-1 border-black">{{ $no++ }}</td>
                            <td class="border border-1 border-black text-left pl-2">
                                {{ $f->kode_peminjaman }}</td>
                            <td class="border border-1 border-black">
                                {{ $f->id_user }}
                            </td>
                            <td class="border border-1 border-black"> {{ $f->jumlah_buku }}</td>
                            <td class="border border-1 border-black">
                                {{ $f->tgl_peminjaman }}</td>
                            <td class="border border-1 border-black">{{ $f->tgl_pengembalian }}</td>
                            <td class="border border-1 border-black">{{ $f->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
<script>
    // window.print();
</script>

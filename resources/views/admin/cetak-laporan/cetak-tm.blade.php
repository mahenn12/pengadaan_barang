<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 5px;
        }
        th {
            padding: 5px;
            background: whitesmoke;
        }
    </style>

    <center><br>
    <h2>Laporan Transaksi Permintaan</h2>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Permintaan</th>
                <th>Barang</th>
                <th>Pelanggan</th>
                <th>Jumlah Minta</th>
                <th>Total</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($tp as $item)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                        <td>{{$item->tgl_permintaan}}</td>
                        <td>{{$item->barang_id}}</td>
                        <td>{{$item->jumlah_minta}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->pelanggan}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td>{{$item->status_permintaan}}</td>
                    </tr>
                    @endforeach
        </tbody>
    </table>

    </center>

</body>
</html>

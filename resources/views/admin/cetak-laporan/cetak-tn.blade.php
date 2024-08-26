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
    <h2>Laporan Transaksi Pengadaan</h2>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pengadaan</th>
                <th>Tanggal Permintaan</th>
                <th>Barang</th>
                <th>Pelanggan</th>
                <th>Jumlah Minta</th>
                <th>Total</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Bukti Acc</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($tpg as $index => $transaksi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaksi->tanggal_pengadaan }}</td>
                        <td>{{ $transaksi->tanggal_permintaan }}</td>
                        <td>{{ $transaksi->barang_id }}</td>
                        <td>{{ $transaksi->pelanggan_id }}</td>
                        <td>{{ $transaksi->jumlah_minta }}</td>
                        <td>{{ $transaksi->total }}</td>
                        <td>{{ $transaksi->keterangan }}</td>
                        <td>{{ $transaksi->status }}</td>
                        <td>{{ $transaksi->bukti_acc }}</td>
                        <td><center>{{ $transaksi->qty }}</center></td>
                    </tr>
                    @endforeach
        </tbody>
    </table>

    </center>

</body>
</html>

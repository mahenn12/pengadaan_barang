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
    <h2>Laporan Data Supplier</h2>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($sp as $data)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                        <td>{{$data->nama_supplier}}</td>
                        <td>{{$data->no_telepon}}</td>
                        <td>{{$data->alamat}}</td>
                        <td><center>{{$data->qty}}</center></td>
                    </tr>
                    @endforeach
        </tbody>
    </table>

    </center>

</body>
</html>

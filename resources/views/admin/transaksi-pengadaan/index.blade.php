@extends('layouts.app')

@section('header')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Transaksi Pengadaan</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Transaksi Pengadaan</h1>
        </div>
    </div><!--/.row-->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#transaksi-pengadaan').DataTable();
    });
    </script>
@endsection

@section('content')
    <div class="panel panel-default col-md-12">
        <div class="panel-heading"> Transaksi Pengadaan
            <a href="{{ route('transaksi-pengadaan.create') }}" class="btn btn-primary" style="float: right;"><span class="fa fa-plus">&nbsp;</span> tambah</a>
        </div>
        <div class="panel-body">
            <table id="transaksi-pengadaan" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Tanggal Pengadaan</th>
                        <th style="text-align: center;">Tanggal Permintaan</th>
                        <th style="text-align: center;">Barang</th>
                        <th style="text-align: center;">Pelanggan</th>
                        <th style="text-align: center;">Jumlah Minta</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Keterangan</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Bukti Acc</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1 @endphp
                    @foreach ($pengadaan as $data)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$data->tanggal_pengadaan}}</td>
                        <td class="text-center">{{$data->tanggal_permintaan}}</td>
                        <td class="text-center">{{$data->barang->nama_barang}}</td>
                        <td class="text-center">{{$data->supplier->nama_supplier}}</td>
                        <td class="text-center">{{$data->jumlah_minta}}</td>
                        <td class="text-center">{{ number_format($data->total, ) }}</td>
                        <td class="text-center">{{$data->keterangan}}</td>
                        <td class="text-center">{{$data->status}}</td>
                        <td class="text-center"><img src="{{ Storage::url($data->bukti_acc) }}" height="50" width="50"></td>
                        <td class="text-center">
                            <form class="text-center" action="{{route('transaksi-pengadaan.destroy', $data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <a href="{{route('transaksi-pengadaan.edit', $data->id)}}" class="btn btn-warning fa fa-edit"></a>
                                <button type="submit" class="btn btn-danger fa fa-trash" onclick="return confirm('Apakah anda yakin menghapus?')"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

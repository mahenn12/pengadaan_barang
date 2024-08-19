@extends('layouts.app')

@section('header')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Transaksi Permintaan</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Transaksi Permintaan</h1>
        </div>
    </div><!--/.row-->
@endsection

@section('content')

<div class="panel panel-default col-md-12">
    <div class="panel-heading"> Edit Transaksi Permintaan
        <a href="{{ route('transaksi-permintaan.index') }}" class="btn btn-default" style="float: right;"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <form role="form" action="{{ route('transaksi-permintaan.update', $transaksi->id) }}" method="post">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>Tanggal Permintaan</label>
                    <input value="{{ $transaksi->tgl_permintaan->format('d-m-Y') }}" type="date" name="tanggal_permintaan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang" class="form-control" required>
                        @foreach($barang as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $transaksi->barang_id ? 'selected' : '' }}>{{ $data->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Pelanggan</label>
                    <select name="pelanggan" class="form-control" required>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $supplier->id == $transaksi->pelanggan ? 'selected' : '' }}>{{ $supplier->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Minta</label>
                    <input value="{{ $transaksi->jumlah_minta }}" type="number" name="jumlah_minta" class="form-control" required min="0">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ $transaksi->keterangan }}</textarea>
                </div>
                <div class="form-group">
                    <label>Status Permintaan</label>
                    <select name="status_permintaan" class="form-control" required>
                        <option value="Sedang diproses" {{ $transaksi->status_permintaan == 'Sedang diproses' ? 'selected' : '' }}>Sedang diproses</option>
                        <option value="Selesai" {{ $transaksi->status_permintaan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-default" type="reset">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

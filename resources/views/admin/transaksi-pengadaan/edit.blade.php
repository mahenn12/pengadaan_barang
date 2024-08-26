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
            <h1 class="page-header">Edit Transaksi Pengadaan</h1>
        </div>
    </div><!--/.row-->
@endsection

@section('content')

<div class="panel panel-default col-md-12">
    <div class="panel-heading"> Edit Transaksi Pengadaan
        <a href="{{ route('transaksi-pengadaan.index') }}" class="btn btn-default" style="float: right;"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <form role="form" action="{{ route('transaksi-pengadaan.update', $transaksi->id) }}" method="post">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>Tanggal Pengadaan</label>
                    <input value={{$transaksi->tanggal_pengadaan}} type="date" name=tanggal_pengadaan class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Permintaan</label>
                    <input value={{$transaksi->tanggal_permintaan}} type="date" name=tanggal_permintaan class="form-control">
                </div>
                <div class="form-group">
                    <label>Barang</label>
                    <select class="form-control" id="barang" name="barang" required onchange="updateHarga()">
                        <option value="">Pilih Barang</option>
                        @foreach ($barang as $item)
                            <option value="{{ $item->id }}" data-harga="{{ $item->harga_jual }}" {{ $item->id == $transaksi->barang_id ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Pelanggan</label>
                    <select class="form-control" id="pelanggan" name="pelanggan" required>
                        <option value="">Pilih Pelanggan</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $supplier->id == $transaksi->pelanggan_id ? 'selected' : '' }}>{{ $supplier->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Minta</label>
                    <input type="number" class="form-control" id="jumlah_minta" name="jumlah_minta" value="{{ $transaksi->jumlah_minta }}" required oninput="updateTotal()" min="0">
                </div>
                <div class="form-group">
                    <label>Total Permintaan</label>
                    <input type="text" class="form-control" id="total_permintaan" name="total_permintaan" value="Rp. {{ number_format($transaksi->total, 0, ',', '.') }}" readonly>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control">{{ $transaksi->keterangan }}</textarea>
                </div>
                <div class="form-group">
                    <label>Status Permintaan</label>
                    <select class="form-control" id="status_permintaan" name="status" required>
                        <option value="Pending" {{ $transaksi->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ $transaksi->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Rejected" {{ $transaksi->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bukti Acc</label>
                    <input type="file" class="form-control" id="bukti_acc" name="bukti_acc" accept="image/*" onchange="previewImage(event)" placeholder="Gambar">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-default" type="reset">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateHarga() {
        var select = document.getElementById("barang");
        var harga = select.options[select.selectedIndex].getAttribute("data-harga") || 0;
        // Format the price as a currency string
        var formattedHarga = "Rp " + parseFloat(harga).toLocaleString('id-ID');
        document.getElementById("harga_jual_satuan").value = formattedHarga;
        updateTotal(); // Call updateTotal to recalculate if there's already a quantity entered
    }

    function updateTotal() {
        var select = document.getElementById("barang");
        var harga = select.options[select.selectedIndex].getAttribute("data-harga") || 0;
        var jumlah = parseInt(document.getElementById("jumlah_minta").value) || 0;

        // Hitung total permintaan
        var total = harga * jumlah;

        // Format the total as a currency string
        document.getElementById("total_permintaan").value = "Rp " + total.toLocaleString('id-ID');
    }


    // Debugging: Log values to console to check if they are being retrieved correctly
    document.getElementById("barang").addEventListener('change', function() {
        console.log("Selected harga:", document.getElementById("harga_jual_satuan").value);
    });
    document.getElementById("jumlah_minta").addEventListener('input', function() {
        console.log("Calculated total:", document.getElementById("total_permintaan").value);
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script>
    $(document).ready(function() {
        $('.custom-date').datepicker({
            format: 'mm/dd/yyyy',
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

@endsection

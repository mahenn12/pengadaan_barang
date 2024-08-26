<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TransaksiPermintaan;
use App\Models\Barang;
use App\Models\Supplier;

class TransaksiPermintaanController extends Controller
{
    public function index()
    {
        $permintaan = TransaksiPermintaan::all(); // Ambil semua data transaksi
        return view('admin.transaksi-permintaan.index', compact('permintaan'));
    }

    public function cetaktm()
    {
        $permintaan = TransaksiPermintaan::all(); // Ambil semua data transaksi permintaan
        $pdf = \PDF::loadview('admin.cetak-laporan.cetak-tm', ['permintaan' => $permintaan]);
        return $pdf->download('laporan-transaksi-permintaan.pdf');
    }

    public function create()
    {
        $barang = Barang::all(); // Ambil semua data barang
        $suppliers = Supplier::all();
        return view('admin.transaksi-permintaan.create', compact('barang', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_permintaan' => 'required|date', // Ubah format di sini
            'barang' => 'required|exists:barangs,id',
            // 'harga_jual' => 'required|string', // Validasi harga jual
            'jumlah_minta' => 'required|integer',
            // 'total' => 'required|numeric', // Validasi total
            'pelanggan' => 'required|exists:suppliers,id',
            'keterangan' => 'nullable|string',
            'status_permintaan' => 'required|string|max:255',
        ], [
            'harga_jual.numeric' => 'Harga jual harus berupa angka yang valid.',
            'total.numeric' => 'Total harus berupa angka yang valid.',
        ]);

        // Ubah format tanggal
        // $tgl_permintaan = Carbon::createFromFormat('d-m-Y', $request->tgl_permintaan)->format('Y-m-d');

        // Ubah format total menjadi angka
        // $total = str_replace(['Rp ', '.', ','], ['', '', '.'], $request->total); // Menghapus 'Rp ', titik, dan mengganti koma dengan titik

        $validated['tgl_permintaan'] = $request->tanggal_permintaan;
        $validated['barang_id'] = $request->barang;
        $validated['total'] = Barang::findOrFail($request->barang)->harga_jual * $request->jumlah_minta;

        unset(
            $validated['tanggal_permintaan'],
            $validated['barang'],
        );
        // Simpan data
        TransaksiPermintaan::create($validated);

        return redirect()->route('transaksi-permintaan.create')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Logic to show a specific transaction
    }

    public function edit($id)
    {
        // Ambil transaksi berdasarkan ID
        $transaksi = TransaksiPermintaan::findOrFail($id); // Menggunakan findOrFail untuk menangani jika tidak ditemukan

        // Ubah format tanggal menjadi objek Carbon
        $transaksi->tgl_permintaan = Carbon::parse($transaksi->tgl_permintaan);

        // Ambil data barang dan supplier untuk dropdown
        $barang = Barang::all(); // Ambil semua data barang
        $suppliers = Supplier::all(); // Ambil semua data supplier

        // Kembalikan view dengan data yang diperlukan
        return view('admin.transaksi-permintaan.edit', compact('transaksi', 'barang', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggal_permintaan' => 'required|date',
            'barang' => 'required|exists:barangs,id',
            'jumlah_minta' => 'required|integer|min:1',
            'pelanggan' => 'required|exists:suppliers,id',
            'keterangan' => 'nullable|string',
            'status_permintaan' => 'required|string|max:255',
        ]);

        // Temukan barang untuk menghitung total
        $barang = Barang::findOrFail($request->barang);
        $validated['total_permintaan'] = $barang->harga_jual * $request->jumlah_minta; // Hitung total permintaan

        // Temukan transaksi dan perbarui
        $transaksi = TransaksiPermintaan::findOrFail($id);
        $transaksi->update(array_merge($validated, [
            'barang_id' => $request->barang,
        ]));

        return redirect()->route('transaksi-permintaan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Temukan transaksi berdasarkan ID
        $transaksi = TransaksiPermintaan::findOrFail($id);

        // Hapus transaksi
        $transaksi->delete();

        return redirect()->route('transaksi-permintaan.index')->with('success', 'Data berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPengadaan;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class TransaksiPengadaanController extends Controller
{
    public function index()
    {
        // Fetch data for the procurement page
        $pengadaan = TransaksiPengadaan::with(['barang', 'supplier'])->get(); // Fetch all data
        return view('admin.transaksi-pengadaan.index', compact('pengadaan'));
    }

    public function create()
    {
        $barang = Barang::all(); // Ambil semua data barang
        $suppliers = Supplier::all();
        return view('admin.transaksi-pengadaan.create', compact('barang', 'suppliers'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'tanggal_pengadaan' => 'required|date_format:d-m-Y',
            'tanggal_permintaan' => 'required|date_format:d-m-Y',
            'barang_id' => 'required|exists:barangs,id',
            'pelanggan_id' => 'required|exists:suppliers,id',
            'keterangan' => 'nullable|string',
            'jumlah_minta' => 'required|numeric|min:1|max:1000',
            'status' => 'required|string|max:255',
            'bukti_acc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        $validated['tanggal_pengadaan'] = \Carbon\Carbon::parse($request->tanggal_pengadaan)->format('Y-m-d'); // Change format to Y-m-d
        $validated['tanggal_permintaan'] = \Carbon\Carbon::parse($request->tanggal_permintaan)->format('Y-m-d'); // Change format to Y-m-d


        $validated['total'] = Barang::findOrFail($request->barang_id)->harga_jual * $request->jumlah_minta;

        $validated['bukti_acc'] = null;

        if ($request->hasFile('bukti_acc')) {
            $validated['bukti_acc'] = $request->file('bukti_acc')->store('uploads/bukti_acc', 'public'); // Store in public/uploads/bukti_acc
        }

        TransaksiPengadaan::create($validated);

        return redirect()->route('transaksi-pengadaan.create')->with('success','Data berhasil ditambahkan');

        try {

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Database error occurred.']);
        }
    }

    public function show($id)
    {
        // Logic to show a specific procurement entry
    }

    public function edit($id)
    {
        $transaksi = TransaksiPengadaan::findOrFail($id);
        $barang = Barang::all(); // Ambil semua barang
        $suppliers = Supplier::all(); // Ambil semua pelanggan
        return view('admin.transaksi-pengadaan.edit', compact('transaksi', 'barang', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'tanggal_pengadaan' => 'required|date_format:d-m-Y',
            'tanggal_permintaan' => 'required|date_format:d-m-Y',
            'barang_id' => 'required|exists:barangs,id',
            'pelanggan_id' => 'required|exists:suppliers,id',
            'keterangan' => 'nullable|string',
            'jumlah_minta' => 'required|numeric|min:1|max:1000',
            'status' => 'required|string|max:255',
            'bukti_acc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the existing procurement entry
        $transaksi = TransaksiPengadaan::findOrFail($id);

        // Update the total price
        $validated['total'] = Barang::findOrFail($request->barang_id)->harga_jual * $request->jumlah_minta;

        // Handle file upload if exists
        if ($request->hasFile('bukti_acc')) {
            // Store the new file
            $validated['bukti_acc'] = $request->file('bukti_acc')->store('uploads/bukti_acc', 'public');
        } else {
            // Keep the existing file if no new file is uploaded
            $validated['bukti_acc'] = $transaksi->bukti_acc;
        }

        // Update the existing record
        $validated['tanggal_pengadaan'] = \Carbon\Carbon::parse($request->tanggal_pengadaan)->format('Y-m-d'); // Change format to Y-m-d
        $validated['tanggal_permintaan'] = \Carbon\Carbon::parse($request->tanggal_permintaan)->format('Y-m-d'); // Change format to Y-m-d
        $transaksi->update($validated);

        return redirect()->route('transaksi-pengadaan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Logic to delete a specific procurement entry
    }
}

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
        $pengadaan = TransaksiPengadaan::all(); // Fetch all data
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
        $request->validate([
            'kode_barang_masuk' => 'required|string',
            'tanggal_pengadaan' => 'required|date',
            'tanggal_permintaan' => 'required|date',
            'barang' => 'required|exists:barangs,id',
            'pelanggan' => 'required|exists:suppliers,id',
            'jumlah_minta' => 'required|integer',
            'total' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:255',
            'bukti_acc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ],[
            'total.numeric' => 'Total harus berupa angka yang valid.'
        ]);

        try {
            // Convert the date format from 'd-m-Y' to 'Y-m-d'
            $validated['tgl_pengadaan'] = \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal_pengadaan)->format('Y-m-d');
            $validated['tgl_permintaan'] = \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal_permintaan)->format('Y-m-d');
            $validated['barang_id'] = $request->barang;
            $validated['total'] = Barang::findOrFail($request->barang)->harga_jual * $request->jumlah_minta;

            unset(
                $validated['tanggal_pengadaan'],
                $validated['tanggal_permintaan'],
                $validated['barang'],
            );

            // Handle file upload
            $buktiAccPath = null;
            if ($request->hasFile('bukti_acc')) {
                $file = $request->file('bukti_acc');
                $buktiAccPath = $file->store('uploads/bukti_acc', 'public'); // Store in public/uploads/bukti_acc
            }

            TransaksiPengadaan::create($validated);
            return redirect()->route('transaksi-pengadaan.create')->with('success','Data berhasil ditambahkan');
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
        // Logic to edit a specific procurement entry
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific procurement entry
    }

    public function destroy($id)
    {
        // Logic to delete a specific procurement entry
    }
}
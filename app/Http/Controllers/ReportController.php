<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Supplier;
use App\Models\TransaksiPermintaan;
use App\Models\TransaksiPengadaan;
use Session;

class ReportController extends Controller
{
    public function index(){
        return view('admin.cetak-laporan.index');
    }

    public function laporan(Request $request){
        $start = $request->tanggal_awal;
        $end = $request->tanggal_akhir;

        if($end >= $start){
            if($request->cetak == "masuk"){
                $bm = BarangMasuk::whereBetween('tanggal_masuk', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('admin.cetak-laporan.cetak-bm', compact('bm','start','end'));
                return $pdf->download('laporan-barang-masuk.pdf');
            }
            elseif($request->cetak == "keluar"){
                $bk = BarangKeluar::whereBetween('tanggal_keluar', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('admin.cetak-laporan.cetak-bk', compact('bk','start','end'));
                return $pdf->download('laporan-barang-keluar.pdf');
            }
            elseif($request->cetak == "supplier"){
                $sp = Supplier::whereBetween('tanggal_supplier', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('admin.cetak-laporan.cetak-supplier', compact('sp','start','end'));
                return $pdf->download('laporan-supplier.pdf');
            }
            elseif($request->cetak == "transaksi_permintaan"){
                $tp = TransaksiPermintaan::whereBetween('tgl_permintaan', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('admin.cetak-laporan.cetak-tm', compact('tp','start','end'));
                return $pdf->download('laporan-transaksi-permintaan.pdf');
            }
            elseif($request->cetak == "transaksi_pengadaan"){
                $tpg = TransaksiPengadaan::whereBetween('tanggal_pengadaan', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('admin.cetak-laporan.cetak-tn', compact('tpg','start','end'));
                return $pdf->download('laporan-transaksi-pengadaan.pdf');
            }
        }
        elseif($end < $start){
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Tanggal Yang Dimasukkan Tidak Valid"
            ]);
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kelola_ikan;
use App\Models\Laporan;
use App\Models\Penjualan;
use App\Models\Stok_ikan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan()
    {
        $laporan = Laporan::join('penjualan', 'laporan.id_penjualan', '=', 'penjualan.id_penjualan')
            ->join('pembayaran', 'laporan.id_pembayaran', '=', 'pembayaran.id_pembayaran')->join('stok_ikan', 'laporan.id_stok', '=', 'stok_ikan.id_stok')
            ->join('kelola_ikan', 'laporan.kode_ikan', '=', 'kelola_ikan.kode_ikan')->join('users', 'penjualan.id_user', '=', 'users.id')->select(
                'users.name',
                'penjualan.stok_jual',
                'penjualan.tanggal_jual',
                'stok_ikan.stok',
                'kelola_ikan.*'
            )->groupBy('penjualan.id_penjualan')->get();
        return view('kelola_admin.laporan_akhir.laporan', compact('laporan'));
    }

    public function expired()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('Y-m-d');

        $expired = Kelola_ikan::join('stok_ikan', 'kelola_ikan.kode_ikan', '=', 'stok_ikan.kode_ikan')->join('users', 'kelola_ikan.id_user', '=', 'users.id')
            ->select('kelola_ikan.*', 'stok_ikan.*', 'users.name as nama_user')
            ->where('tanggal_expired', '<=', $tgl)->get();
        return view('kelola_admin.laporan_akhir.laporan_expired', compact('expired'));
    }
}

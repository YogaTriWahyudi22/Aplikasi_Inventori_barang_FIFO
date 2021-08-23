<?php

namespace App\Http\Controllers;

use App\Models\Histori_stok;
use App\Models\Penjualan;
use App\Models\Kelola_ikan;
use App\Models\Laporan;
use App\Models\Pembayaran;
use App\Models\Stok_ikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::join('users', 'penjualan.id_user', '=', 'users.id')->join('kelola_ikan', 'penjualan.kode_ikan', '=', 'kelola_ikan.kode_ikan')
            ->select('users.name', 'penjualan.*', 'kelola_ikan.nama_ikan', 'kelola_ikan.tanggal_input', 'kelola_ikan.harga_jual')->get();
        return view('kelola_admin.penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $ikan = Kelola_ikan::all();
        return view('kelola_admin.penjualan.tambah', compact('ikan'));
    }


    public function ajax_jual()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('Y-m-d');
        if ($_POST['ikan']) {
            $ajax = Kelola_ikan::where('nama_ikan', '=', $_POST['ikan'])->join('stok_ikan', 'kelola_ikan.kode_ikan', '=', 'stok_ikan.kode_ikan')
                ->select('kelola_ikan.*', 'kelola_ikan.kode_ikan as kode_i', 'stok_ikan.*')->first();

            $selisih1 = date_create($ajax->tgl);
            $selisih2 = date_create($ajax->tanggal_expired);
            $selisih = date_diff($selisih2, $selisih1);
            if ($selisih->format('%d') <= 7 and $selisih->format('%d') >= 5) {
                $kualitas = 'A';
                $harga_jual = $ajax->harga_jual - 0;
                return response()->json([
                    "kualitas" => $kualitas,
                    "harga_jual" => $harga_jual,
                    "ajax" => $ajax
                ]);
            } elseif ($selisih->format('%d') <= 5 and $selisih->format('%d') >= 3) {

                $kualitas = 'B';
                $harga_jual = $ajax->harga_jual - $ajax->harga_jual * 0.05;
                return response()->json([
                    'kualitas' => $kualitas,
                    'harga_jual' => $harga_jual,
                    "ajax" => $ajax
                ]);
            } elseif ($selisih->format('%d') <= 5 and $selisih->format('%d') >= 1) {
                $kualitas = 'C';
                $harga_jual = $ajax->harga_jual - $ajax->harga_jual * 0.1;
                return response()->json([
                    'kualitas' => $kualitas,
                    'harga_jual' => $harga_jual,
                    'ajax' => $ajax,
                ]);
            } else {
                $kualitas = 'Ikan Rusak';
                $harga_jual = $ajax->harga_jual - $ajax->harga_jual;
                return response()->json([
                    'kualitas' => $kualitas,
                    'harga_jual' => $harga_jual,
                    'ajax' => $ajax,
                ]);
            }
        }
    }

    public function store(Request $request)
    {
        // memecahkan uang
        $harga = $request->total_pembayaran;
        $harga =  explode("Rp.", $harga)[1];
        $harga =  explode(".", $harga);
        $harga =  implode($harga);

        $pembayaran = new Pembayaran;
        $pembayaran->tipe_pembayaran = $request->pembayaran;
        $pembayaran->total_pembayaran = $harga;
        $pembayaran->save();
        $id_pembayaran = $pembayaran->id_pembayaran;

        $store = new Penjualan;
        $store->id_user = Auth::user()->id;
        $store->id_stok = $request->id_stok;
        $store->kode_ikan = $request->kode_ikan;
        $store->stok_jual = $request->stok_jual;
        $store->tanggal_jual = $request->tanggal_jual;
        $store->save();
        $id_penjualan = $store->id_penjualan;

        //update data master stok ketika tanaman di jual

        $stok = Stok_ikan::where('kode_ikan', $request->kode_ikan)->get();

        foreach ($stok as $key) {
            $key->update([
                'stok' => $key->stok - $request->stok_jual
            ]);
        }

        //end update data master stok ketika tanaman di jual

        // Edit Harga Sesuai dengan kualitas
        Kelola_ikan::where('kode_ikan', $request->kode_ikan)->update(['harga_jual' => $request->harga_jual]);
        // !!Edit Harga Sesuai dengan kualitas

        // histori stok terupdate dan detail penjualan bertambah ketika request stok jual

        if ($request->stok_jual) {

            $histori_kurang = Histori_stok::where('kode_ikan', $request->kode_ikan)->orderBy('tanggal')->get();
            $total_stok = $histori_kurang->sum("stok");

            // proses FIFO

            foreach ($histori_kurang as $t) {
                if ($t->stok < $request->stok_jual) {
                    $h = $request->stok_jual -= $t->stok;
                    // $this->insertDetail($id, $request, $t->stok, $request);
                    Laporan::create([
                        'id_penjualan' => $id_penjualan,
                        'id_pembayaran' => $id_pembayaran,
                        'id_stok' => $request->id_stok,
                        "id_histori_stok" => $t->id_histori_stok,
                        'kode_ikan' => $request->kode_ikan,
                    ]);
                    $t->update([
                        "stok" => 0
                    ]);
                } else if ($request->stok_jual < $total_stok) {
                    // $this->insertDetail($id_penjualan, $request, $t->stok - $request->stok_jual);
                    Laporan::create([
                        'id_penjualan' => $id_penjualan,
                        'id_pembayaran' => $id_pembayaran,
                        'id_stok' => $request->id_stok,
                        "id_histori_stok" => $t->id_histori_stok,
                        'kode_ikan' => $request->kode_ikan,
                    ]);
                    if ($t->stok >= $request->stok_jual) {
                        $t->update([
                            "stok" => $t->stok - $request->stok_jual
                        ]);
                        Alert::success('Penjualan Berhasil', 'Data Berhasil Ditambahkan');
                        return redirect()->route('kelola_penjualan');
                    }
                } else {
                    // $this->insertDetail($id_penjualan, $request, $t->stok - $request->stok_jual, $request);
                    Laporan::create([
                        'id_penjualan' => $id_penjualan,
                        'id_pembayaran' => $id_pembayaran,
                        'id_stok' => $request->id_stok,
                        "id_histori_stok" => $t->id_histori_stok,
                        'kode_ikan' => $request->kode_ikan,
                    ]);
                    $t->update([
                        "stok" => $t->stok - $request->stok_jual
                    ]);
                }
            }
        }

        // end histori stok terupdate dan detail penjualan bertambah ketika request stok jual

        Alert::success('Penjualan Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kelola_penjualan');
    }
}

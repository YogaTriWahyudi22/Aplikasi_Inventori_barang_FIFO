<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AkunController extends Controller
{
    public function dashboard()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('Y-m-d');
        $data = [
            'jumlah_expired' => DB::table('kelola_ikan')->where('tanggal_expired', '<=', $tgl)->count(),
            'jumlah_masuk' => DB::table('kelola_ikan')
                ->select(DB::raw('SUM(id_kelola_ikan) as id'))->first(),
            'jumlah_terjual' => DB::table('penjualan')
                ->select(DB::raw('SUM(id_penjualan) as id_penjualan'))->first(),

            // 'barang_keluar' => DB::table('mutasi')
            //     ->select(DB::raw('SUM(stok) as stok_keluar'))->first(),

            // 'nilai_masuk' => DB::table('master_stok')
            //     ->SELECT(DB::raw('SUM(stok * harga_satuan) as nilai_stok'))
            //     ->first(),

            // 'nilai_keluar' => DB::table('mutasi')
            //     ->join('master_stok', 'mutasi.id_stok', '=', 'master_stok.id_stok')
            //     ->SELECT(DB::raw('SUM(mutasi.stok * harga_satuan) as nilai_jumlah '))
            //     ->first(),

            // 'nilai_expired' => DB::table('input_barang')
            //     ->join('master_stok', 'input_barang.kode_barang', '=', 'master_stok.kode_barang')
            //     ->where('expired', '<=', $tgl)
            //     ->SELECT(DB::raw('SUM(stok * harga_satuan) as nilai_expired'))
            //     ->first(),

            // 'stok_awal' => DB::table('master_stok')
            //     ->select(DB::raw('SUM(stok_awal) as stok_awal'))->first(),
        ];
        if (!empty(Auth::user()->username)) {
            return view('kelola_admin.kelola_akun.dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function index()
    {
        $index = User::all();
        return view('kelola_admin.kelola_akun.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelola_admin.kelola_akun.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $store = new User;
        $store->name = $request->name;
        $store->username = $request->username;
        $store->password = Hash::make($request->password);
        $store->status = 'admin';
        $store->save();

        $alamat = new Alamat;
        $alamat->username = $request->username;
        $alamat->nohp = $request->nohp;
        $alamat->alamat = $request->alamat;
        $alamat->save();

        Alert::success('Kelola Akun Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kelola_akun');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::find($id);
        return view('kelola_admin.kelola_akun.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = User::find($request->id);
        $update->name = $request->name;
        $update->alamat->alamat = $request->alamat;
        $update->alamat->nohp = $request->nohp;
        $update->save();
        $update->alamat->save();

        Alert::success('Kelola Akun Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('kelola_akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        Alert::error('Kelola Akun Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('kelola_akun');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kelola_ikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Kelola_ikanController extends Controller
{
    public function index()
    {
        $index = Kelola_ikan::all();
        return view('kelola_admin.kelola_ikan.index', compact('index'));
    }


    public function create()
    {
        return view('kelola_admin.kelola_ikan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // memecahkan uang
        $harga = $request->harga_beli;
        $harga =  explode("Rp.", $harga)[1];
        $harga =  explode(".", $harga);
        $harga =  implode($harga);

        // memecahkan uang
        $harga_jual = $request->harga_jual;
        $harga_jual =  explode("Rp.", $harga_jual)[1];
        $harga_jual =  explode(".", $harga_jual);
        $harga_jual =  implode($harga_jual);

        $tgl_expired = date('Y-m-d', strtotime($request->tanggal_input . ' + 7 days'));

        $request->validate([
            'kode_ikan' => 'required|unique:kelola_ikan,kode_ikan',
        ]);

        $store = new Kelola_ikan;

        $store->id_user = Auth::user()->id;
        $store->kode_ikan = $request->kode_ikan;
        $store->nama_ikan = $request->nama_ikan;
        $store->tanggal_input = $request->tanggal_input;
        $store->tanggal_expired = $tgl_expired;
        $store->harga_beli = $harga;
        $store->harga_jual = $harga_jual;;
        $store->save();
        Alert::success('Kelola Ikan Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kelola_ikan');
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
    public function edit($id_kelola_ikan)
    {
        $edit = Kelola_ikan::join('users', 'kelola_ikan.id_user', '=', 'users.id')->where('id_kelola_ikan', $id_kelola_ikan)->first();
        // dd($edit);
        return view('kelola_admin.kelola_ikan.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelola_ikan)
    {
        $tgl_expired = date('Y-m-d', strtotime($request->tanggal_input . ' + 7 days'));
        // memecahkan uang
        $harga = $request->harga_beli;
        $harga =  explode("Rp.", $harga)[1];
        $harga =  explode(".", $harga);
        $harga =  implode($harga);

        // memecahkan uang
        $harga_jual = $request->harga_jual;
        $harga_jual =  explode("Rp.", $harga_jual)[1];
        $harga_jual =  explode(".", $harga_jual);
        $harga_jual =  implode($harga_jual);

        Kelola_ikan::where('id_kelola_ikan', $id_kelola_ikan)->update([
            'id_user' => Auth::user()->id,
            'kode_ikan' => $request->kode_ikan,
            'nama_ikan' => $request->nama_ikan,
            'harga_beli' => $harga,
            'harga_jual' => $harga_jual,
            'tanggal_input' => $request->tanggal_input,
            'tanggal_expired' => $tgl_expired,
        ]);

        Alert::success('Kelola Tanaman Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('kelola_ikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelola_ikan)
    {
        $delete = Kelola_ikan::find($id_kelola_ikan);

        $delete->delete();

        Alert::error('Kelola Tanaman Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('kelola_tanaman');
    }
}

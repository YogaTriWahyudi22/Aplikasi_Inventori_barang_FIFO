<?php

namespace App\Http\Controllers;

use App\Models\Stok_ikan;
use App\Models\Kelola_ikan;
use App\Models\Histori_stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Stok_ikan::all();
        return view('kelola_admin.master_stok.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelola_ikan = Kelola_ikan::all();
        return view('kelola_admin.master_stok.tambah', compact('kelola_ikan'));
    }

    public function ajax_stok()
    {
        if (isset($_POST['stok'])) {

            $res = array();
            $input = Kelola_ikan::where('nama_ikan', $_POST['stok'])->first();
            $res = array('kode_ikan' => $input->kode_ikan);
            return response()->json($res);
        }
    }

    public function store(Request $request)
    {

        $stok_ikan = Stok_ikan::where('kode_ikan', $request->kode_ikan)->first();
        if ($stok_ikan == NULL) {
            $tambah = new Stok_ikan;
            $tambah->id_user = Auth::user()->id;
            $tambah->kode_ikan = $request->kode_ikan;
            $tambah->stok = $request->stok;
            $tambah->stok_awal = $request->stok;
            $tambah->tanggal = $request->tanggal;
            $tambah->save();

            $histori = new Histori_stok;
            $histori->id_user = Auth::user()->id;
            $histori->kode_ikan = $request->kode_ikan;
            $histori->stok_awal = $request->stok;
            $histori->stok = $request->stok;
            $histori->tanggal = $request->tanggal;
            $histori->keterangan = 'Tambah Data';
            $histori->save();

            Alert::success('Stok Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('kelola_stok');
        } elseif ($stok_ikan != NULL) {
            Stok_ikan::where($stok_ikan->kode_ikan == $request->kode_ikan)->update([
                'stok' => $request->stok + $stok_ikan->stok,
                'stok_awal' => $request->stok + $stok_ikan->stok_awal,
            ]);

            $histori = new Histori_stok;
            $histori->id_user = Auth::user()->id;
            $histori->kode_ikan = $request->kode_ikan;
            $histori->stok_awal = $request->stok;
            $histori->stok = $request->stok;
            $histori->tanggal = $request->tanggal;
            $histori->keterangan = 'Tambah Data';
            $histori->save();

            Alert::success('Stok Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('kelola_stok');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

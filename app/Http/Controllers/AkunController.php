<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AkunController extends Controller
{
    public function dashboard()
    {
        if (!empty(Auth::user()->username)) {
            return view('kelola_admin.kelola_akun.dashboard');
        } else {
            return view('kelola_admin.kelola_akun.dashboard');
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

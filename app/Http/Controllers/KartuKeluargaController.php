<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Models\DataPenduduk;

class KartuKeluargaController extends Controller
{
    public function index()
    {
        $data = KartuKeluarga::orderBy('id', 'desc')->get();
        return view('_admin.kartukeluarga', compact('data'));
    }
    public function tambah(Request $req)
    {
        $this->validate($req, [
            'nokk' => 'min:5|unique:kartukeluarga',
            'kepalakeluarga' => 'required',

        ]);
        KartuKeluarga::create($req->all());
        return redirect()->back()->with('sukses', 'Data berhasil disimpan');
    }
    public function hapus($id)
    {
        $data = KartuKeluarga::find($id);
        DataPenduduk::where('kartukeluarga_id', $id)->delete();
        $data->delete();
        return redirect()->back()->with('sukses', 'Data berhasil dihapus');
    }
    public function edit($id, Request $req)
    {
        KartuKeluarga::find($id)->update($req->all());
        return redirect()->back()->with('sukses', 'Data berhasil diubah');
    }

    public function detail($id)
    {
        $data = KartuKeluarga::find($id);

        return view('_admin.kartukeluargadetail', compact('data'));
    }
}

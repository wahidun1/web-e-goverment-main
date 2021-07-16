<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenduduk;
use App\Models\User;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\KartuKeluarga;


class DataPendudukController extends Controller
{
    public function index()
    {
        $data = DataPenduduk::orderBy('id', 'desc')->get();
        $kk = KartuKeluarga::all();
        return view('_admin.datapenduduk', compact('data', 'kk'));
    }
    public function tambah(Request $request)
    {

        $user = new User;
        $user->name = $request->nama;
        $user->nik = $request->nik;
        $user->role = 'user';
        $user->password = bcrypt('user123');
        $user->remember_token = Str::random(60);
        $user->save();
        // $req->user_id = $user->id;
        $request->request->add(['user_id' => $user->id]);
        $data = DataPenduduk::create($request->all());
        return redirect()->back()->with('sukses', 'Data berhasil ditambah');
    }

    public function edit(Request $request, $id)
    {
        $data = DataPenduduk::find($id);

        $user = User::where(['id' => $data->user_id])->update(['nik' => $request->nik]);


        $data->update($request->all());
        return redirect()->back()->with('sukses', 'Data berhasil diupdate');
    }
    public function detail($id)
    {
        $data = DataPenduduk::find($id);

        return view('_admin.datapendudukdetail', compact('data'));
    }
    public function hapus($id)
    {
        $data = DataPenduduk::find($id);
        $user = User::find($data->user_id)->delete();
        $data->delete();
        return redirect()->back()->with('sukses', 'Data berhasil dihapus');
    }

    public function penduduktetap()
    {
        $data = DataPenduduk::where('jenispenduduk', 'tetap')->orderby('id', 'desc')->get();
        return view('_admin.penduduktetap', compact('data'));
    }
}

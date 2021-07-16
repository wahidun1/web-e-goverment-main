<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DataPengaduanController extends Controller
{
    public function index()
    {
        $data = Pengaduan::orderBy('id', 'desc')->get();
        return view('_admin.datapengaduan', compact('data'));
    }

    public function tambah(Request $req)
    {
        $data = new Pengaduan;
        $data->nama = auth()->user()->name;
        $data->nohp = $req->nohp;
        $data->email = $req->email;
        $data->pertanyaan = $req->pertanyaan;

        $data->status = 'Process';
        if ($req->has('filepengaduan')) {


            $req->file('filepengaduan')->move(public_path() . '/storage/pengaduan/' . auth()->user()->name, $req->file('filepengaduan')->getClientOriginalName());
            $data->filepengaduan = $req->file('filepengaduan')->getClientOriginalName();
            $data->save();
        } else {

            $data->save();
        }
        return redirect()->back()->with('success', 'Data Berhasil Di input');
    }

    public function hapus($id)
    {
        $data = Pengaduan::find($id);
        $image_path = public_path() . "/storage/pengaduan/" . $data->nama . '/' . $data->filepengaduan;

        if (File::exists($image_path)) {

            File::delete($image_path);
        }
        $data->delete();

        return redirect()->back()->with('success', 'Berita Berhasil Dihapus');
    }

    public function download($filesurat)
    {
        return  response()->download('storage/pengaduan/' . auth()->user()->name . '/' . $filesurat);
    }

    public function edit($id, Request $req)
    {
        $data = Pengaduan::find($id)->update($req->all());
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }
}

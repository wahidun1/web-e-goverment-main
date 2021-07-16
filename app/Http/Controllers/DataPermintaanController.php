<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;

class DataPermintaanController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $data = Permintaan::orderBy('id', 'desc')->get();
        } elseif (auth()->user()->role == 'user') {

            $data = Permintaan::where('author', auth()->user()->name)->orderBy('id', 'desc')->get();
        }
        $surat = Surat::orderBy('id', 'desc')->get();
        return view('_admin.permintaan', compact('data', 'surat'));
    }
    public function tambah(Request $req)
    {
        $data = new Permintaan;
        $data->author = auth()->user()->name;
        $data->deskripsi = $req->deskripsi;
        $data->status = 'Process';
        if ($req->has('filesurat')) {


            $req->file('filesurat')->move(public_path() . '/storage/permintaan/' . auth()->user()->name, $req->file('filesurat')->getClientOriginalName());
            $data->filesurat = $req->file('filesurat')->getClientOriginalName();
            $data->save();
        }
        return redirect()->back()->with('success', 'Berita Berhasil Dibuat');
    }
    public function hapus($id)
    {
        $data = Permintaan::find($id);
        $image_path = 'public/permintaan/' . $data->author . '/' . $data->filesurat;
        // dd(Storage::exists($image_path));
        if (Storage::exists($image_path)) {

            Storage::delete($image_path);
        }
        $data->delete();

        return redirect()->back()->with('success', 'Berita Berhasil Dihapus');
    }

    public function edit(Request $req, $id)
    {
        $data = Permintaan::find($id)->update(['deskripsi' => $req->deskripsi, 'status' => $req->status]);
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function download($filepengaduan)
    {
        return  response()->download('storage/permintaan/' . auth()->user()->name . '/' . $filepengaduan);
    }
}

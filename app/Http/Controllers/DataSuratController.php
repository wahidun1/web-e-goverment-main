<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;
use File;

class DataSuratController extends Controller
{
    public function index()
    {
        $data = Surat::orderBy('id', 'desc')->get();
        return view('_admin.datasurat', compact('data'));
    }
    public function tambah(Request $request)
    {
        $data = new Surat;
        $data->namasurat = $request->surat;
        if ($request->has('contohsurat')) {


            $request->file('contohsurat')->move(public_path() . '/storage/file/', $request->file('contohsurat')->getClientOriginalName());
            $data->contohsurat = $request->file('contohsurat')->getClientOriginalName();
            $data->save();
        }

        return redirect()->back()->with('success', 'Berita Berhasil Dibuat');
    }
    public function hapus($id)
    {
        $data = Surat::find($id);
        $image_path = 'public/file/' . $data->contohsurat;

        if (Storage::exists($image_path)) {

            Storage::delete($image_path);
        }
        $data->delete();
        return redirect()->back()->with('success', 'Berita Berhasil Dihapus');
        // if (Storage::exists($image_path)) {

        //     Storage::deleteDirectory('/public/guru/' . $guru->user->email);
        // }
    }
    public function download($contohsurat)
    {
        return  response()->download('storage/file/' . $contohsurat);
    }
}

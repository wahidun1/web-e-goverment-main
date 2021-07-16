<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenduduk;

class ProfileController extends Controller
{
    public function index()
    {
        $data = DataPenduduk::where('user_id', '=', auth()->user()->id)->get();
        // dd($data);
        return view('_admin.profile.index', compact('data'));
    }
}

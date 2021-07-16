<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenduduk;
use App\Models\KartuKeluarga;
use App\Models\Permintaan;
use App\Models\Surat;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $datapenduduk = DataPenduduk::all()->count();
        $kk = KartuKeluarga::all()->count();
        $permintaan = Permintaan::all()->count();
        $surat = Surat::all()->count();
        $user = User::all()->count();
        return view('_admin.dashboard', compact('datapenduduk', 'kk', 'permintaan', 'surat', 'user'));
    }
}

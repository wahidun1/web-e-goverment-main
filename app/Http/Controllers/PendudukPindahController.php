<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendudukPindahController extends Controller
{
    public function index()
    {
        return view('_admin.pendudukpindah');
    }
}

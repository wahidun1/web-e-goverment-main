<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    use HasFactory;
    protected $table = 'datapenduduk';
    protected $dates = ['tgllahir'];
    protected $fillable = [
        'nik', 'nama', 'tempatlahir', 'tgllahir', 'jeniskelamin', 'statuskawin',
        'alamat', 'jenispenduduk', 'pekerjaan', 'pendidikan', 'agama', 'lurahdesa', 'kecamatan', 'kabupaten', 'provinsi', 'negara', 'user_id', 'kartukeluarga_id'
    ];
    public function kartukeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;
    protected $table = 'kartukeluarga';
    protected $fillable = ['nokk', 'kepalakeluarga'];

    public function datapenduduk()
    {
        return $this->hasMany(DataPenduduk::class, 'kartukeluarga_id');
    }
}

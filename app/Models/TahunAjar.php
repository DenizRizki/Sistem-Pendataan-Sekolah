<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjar extends Model
{
   protected $fillable = [
        'kode_tahun_ajar',
        'nama_tahun_ajar',
        'semester',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}


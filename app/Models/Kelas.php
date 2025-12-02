<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'nama_kelas',
        'level_kelas',
        'tahun_ajar_id',
        'jurusan_id',
    ];

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}


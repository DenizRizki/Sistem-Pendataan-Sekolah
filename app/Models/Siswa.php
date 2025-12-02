<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'jurusan_id',
        'kelas_id',
        'tahun_ajar_id',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class);
    }

    public function kelasDetail()
    {
        return $this->hasMany(KelasDetail::class);
    }
}


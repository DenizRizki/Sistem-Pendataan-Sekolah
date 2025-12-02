<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasDetail extends Model
{
    protected $table = 'kelas_detail'; 

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'tahun_ajar_id',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class);
    }
}



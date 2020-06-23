<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiEvaluasi extends Model
{
    protected $table = "tb_evaluasi_nilai";
    protected $primarykey = "id";
    protected $fillable = [
        'kriteria_id', 'alternatif_id', 'nilai', 'user_id'
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}

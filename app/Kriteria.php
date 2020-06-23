<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $fillable = ['nama_kriteria', 'tipe_kriteria', 'bobot_kriteria'];

    protected $table = 'tb_kriteria';

    public function nilai()
    {
        return $this->hasMany(NilaiEvaluasi::class, 'kriteria_id', 'id');
    }
}

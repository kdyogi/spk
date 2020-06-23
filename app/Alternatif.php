<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $fillable = ['nama_alternatif', 'user_id'];

    protected $table = 'tb_alternatif';

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function nilai()
    // {
    //     return $this->hasMany(NilaiEvaluasi::class);
    // }

    public function nilai()
    {
        // return $this->belongsToMany(NilaiEvaluasi::class, 'tb_evaluasi_nilai', 'alternatif_id', 'kriteria_id');
        return $this->hasMany(NilaiEvaluasi::class);
    }
}

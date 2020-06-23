<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Pengguna;

class CalonSiswa extends Model
{
    protected $fillable = ([
        'nama_calonSiswa',
        'alamat_calonSiswa',
        'telp_calonSiswa',
        'jenisKelamin_calonSiswa',
        'email_calonSiswa',
        'user_id'
    ]);

    protected $table = 'tb_calon_siswa';

    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}

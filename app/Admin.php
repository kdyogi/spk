<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Pengguna;

class Admin extends Model
{
    protected $fillable = ([
        'nama_admin',
        'alamat_admin',
        'telp_admin',
        'jenisKelamin_admin',
        'email_admin',
        'user_id'
    ]);

    protected $table = 'tb_admin';

    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
